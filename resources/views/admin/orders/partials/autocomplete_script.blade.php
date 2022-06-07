<script>
    var _urlData = $("#searchProducts").attr('data-action');
            $( "#searchProducts" ).autocomplete({
                minLength: 3,
                source: function (request, response) {
                    $.ajax({
                        type: "GET",
                        contentType: "application/json; charset=utf-8",
                        url: _urlData,
                        dataType: "json",
                        data: {QueryFilter: request.term , selectedVariants : $('#searchProducts').attr('data-variants') },
                        success: function (data) {
                            response($.map(data.products, function (item) {
                                var AC = new Object();
                                //autocomplete default values REQUIRED
                                AC.label = item.name;
                                AC.value = item.slug;
                                AC.variant = item.variants[0].id;
                                AC.image = item.images[0].path;
                                return AC
                            }));
                        }
                    });
                },
                select: function (event, ui) {
                    event.preventDefault();
                    var selectedObj = ui.item;
                    var _urlProductHtml  = "{{route(BASE_ADMIN_PATH . '.orders.getProductOrder' ,"__product")}}".replace('__product', selectedObj.value);
                    // modifier liste des variants selectionné
                    var selectedVariants = $('#searchProducts').attr('data-variants')+ "";
                    selectedVariants = selectedVariants.split(',');
                    if( $.inArray(selectedObj.variant, selectedVariants)  == -1){
                        selectedVariants.push(selectedObj.variant);
                        var strSelectedVariants = selectedVariants.join(",");
                        $('#searchProducts').attr('data-variants',strSelectedVariants);
                    }

                    $.ajax({
                        type: "GET",
                        url: _urlProductHtml ,
                        success: function (response) {
                            if($(".card.ecommerce-card").length > 0){
                                $(".card.ecommerce-card").last().after(response.productHtml);
                            } else {
                                $(".all-products-order").html(response.productHtml);
                            }
                            $('#searchProducts').val("");
                        }
                    });
                }
            })
            .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                var _image  = '{{ asset(UPLOAD_IMAGES_PATH . '__image') }}'.replace('__image', item.image);
                return $( "<li></li>" )
                    .data( "item.autocomplete", item )
                    .append( "<table><tr><td> <img src='" + _image  + "' height='50px' /></td><td>" + item.label + "</td><td>" + item.value + "</td></tr></table>" )
                    .appendTo( ul );
            };

            // remove items from wishlist page
            $(document).on('click','.remove-item-order', function () {
                if(window.confirm('Voulez vous vraiment supprimer ce produit ? ') == true){
                    // modifier liste des variants selectionné
                    var selectedVariants = $('#searchProducts').attr('data-variants')+ "";
                    selectedVariants = selectedVariants.split(',');
                    console.log(selectedVariants);
                    var currentVariant = $(this).attr('data-current-variant');
                    console.log(currentVariant);
                    console.log($.inArray(currentVariant, selectedVariants) );
                    if( $.inArray(currentVariant, selectedVariants)  != -1){
                        var selectedVariants = selectedVariants.filter(e => e !== currentVariant)
                        var strSelectedVariants = selectedVariants.join(",");
                        $('#searchProducts').attr('data-variants',strSelectedVariants);
                    }
                    $(this).closest('.ecommerce-card').remove();
                    toastr['error']('', "{{__('messages.successfully_deleted') }}" + ' 🗑️', {
                    closeButton: true,
                    tapToDismiss: false,
                    });
                }
            });

            // changer le mode de livraison et les frais à partir de la ville selectionné
            $(document).on('change','.section-form-order select[name="city_id"]', function (event) {
                event.preventDefault();
                var _this = $(this);
                var _city = $(this).val();
                var _url = $(this).attr('data-action') + "/" + _city;
                $.ajax({
                    type: "GET",
                    url: _url,
                    success: function (response) {
                        if(response.success){
                            _this.closest('.section-form-order').find('input[name="shipping_title"]').val(response.shippingMethod.title);
                            _this.closest('.section-form-order').find('input[name="shipping_cost"]').val(response.shippingMethod.cost);
                        }
                    }
                });
            });

</script>
