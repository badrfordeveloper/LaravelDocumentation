<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.code')}} *</label>
            <input required value="{{ old('code', @$group->code) }}" name="code" placeholder="{{ __('labels.code')}}"  type="text" class="form-control" />
            @if ($errors->has('code'))
                <span class="error text-danger" for="code">{{ $errors->first('code') }}</span>
            @endif
        </div>

        <div class="mb-1">
            <label class="form-label">{{ __('labels.search')}} </label>
            <input placeholder="{{ __('labels.search')}}" id="searchProducts"  data-action="{{ route(BASE_ADMIN_PATH .'.products.search')}}" type="text" class="form-control" />
        </div>
        <input type="hidden" name="products" id="products">
        <table id="listProducts">
            @if(isset($group))
                @foreach ( $group->products as $product )
                    <tr><td> <img src=" {{ asset(UPLOAD_IMAGES_PATH . $product->images[0]->path) }}" height='50px' /></td><td>{{$product->name}}</td>
                    <td>
                        <button class="btn btn-outline-danger text-nowrap px-1 remove-product" data-key="{{$product->variants[0]->id}}" type="button">
                            <i data-feather="x" class="me-25"></i>
                        </button>
                    </td>
                    </tr>
                @endforeach
            @endif

        </table>
    </div>

</div>


@push('searchProducts')

<script>

    var products = @if(isset($group)) {{ $group->products->pluck('id') }} @else [] @endif;
    $('#products').val(JSON.stringify(products));

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
                        AC.label = item.slug;
                        AC.value = item.name;
                        AC.variant = item.variants[0].id;
                        AC.image = item.images[0].path;
                        return AC
                    }));
                }
            });
        },
        select: function (event, ui) {
            event.preventDefault();
            /* if not exists */
            if(jQuery.inArray(ui.item.variant, products) === -1){
                /* add product */
                products.push(ui.item.variant);
                /* refresh input */
                $('#products').val(JSON.stringify(products));
                console.log(products);
                $("#listProducts").append(rowOpions(ui.item));
                /* load icon */
                $(document).ready(function () {
                    if (feather) {
                        feather.replace({
                            width: 14,
                            height: 14
                        });
                    }
                });
            }
            $('#searchProducts').val("");
          /*   var selectedObj = ui.item;
            var _urlProductHtml  = "{{route(BASE_ADMIN_PATH . '.orders.getProductOrder' ,"__product")}}".replace('__product', selectedObj.label);
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
                    $(".card.ecommerce-card").last().after(response.productHtml);
                    $('#searchProducts').val("");
                }
            }); */
        }

    })
    .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var _image  = '{{ asset(UPLOAD_IMAGES_PATH . '__image') }}'.replace('__image', item.image);
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append( "<table><tr><td> <img src='" + _image  + "' height='50px' /></td><td>" + item.value + "</td></tr></table>" )
            .appendTo( ul );
    };

    function rowOpions(item){
        var _image  = `{{ asset(UPLOAD_IMAGES_PATH . '${item.image}') }}`.replace('__image', item.image);
        var _item = `<tr><td> <img src="${_image}" height='50px' /></td><td>${item.value}</td>
        <td>
            <button class="btn btn-outline-danger text-nowrap px-1 remove-product" data-key="${item.variant}" type="button">
                <i data-feather="x" class="me-25"></i>
            </button>
        </td>
        </tr>
        `;
            return _item ;
    }

    $(document).on('click', '.remove-product', function() {
       var key = $(this).data('key');
       /* remove product */
        products = products.filter(function(elem){
            return elem != key;
        });
        /* refresh input */
        $('#products').val(JSON.stringify(products));
        /* remove html */
        $(this).closest('tr').remove();
    });

</script>
@endpush
