<script>
    /**
     * Update Cart
    */
    var handleDataCartAdd = function (_this, response) {
        if(response.success){
            _this.closest('.ajax-section').find('.loading-action').hide();
            toastr.success(response.success);
            $('#TopCartCounter').text(response.countData);
            $('#sectionMiniCart').html(response.sectionMiniCart);
        }
    }
    var handleDataCartDelete = function (_this, response) {
        if(response.success){
            toastr.success(response.success);
            $('#sectionCartPage').html(response.sectionCartPage);
            $('#sectionMiniCart').html(response.sectionMiniCart);
            $('#TopCartCounter').text(response.countData);
            $('#sectionCartPage').html(response.sectionCartPage);
        }
    }

    $(document).on('click' ,'.add-to-cart-link', function (event) {
        event.preventDefault();
        var _this = $(this);
        var _url = $(this).attr('href');
        addToCartAjax(_this,_url,handleDataCartAdd);
    });

    $(document).on('submit' ,'.form-cart', function (event) {
        event.preventDefault();
        var _this = $(this);
        var _url = $(this).attr('action');
        addToCartAjax(_this,_url,handleDataCartAdd);
    });

    $(document).on('click' ,'.delete-from-cart', function (event) {
        event.preventDefault();
        var _url = $(this).attr('href');
        actionGetCartAjax($(this),_url,handleDataCartDelete);
    });

    function addToCartAjax(_this,_url,handleDataCallback) {
        $.ajax({
            type: "POST",
            url: _url,
            data: _this.serialize(),
            beforeSend: function() {
                $('.loading').removeClass('hide');
            },
            success: function (response) {
                $('.loading').addClass('hide');
                handleDataCallback(_this, response);
            }
        });
     }

     /**
     * Update Wishlist
    */
    var handleDataWishlistAAdd = function (_this, response) {
        if(response.success){
            toastr.success(response.success);
            $('#TopWishlistCounter').text(response.countData);
        }
    }
    var handleDataWishlistADelete = function (_this, response) {
        if(response.success){
            toastr.success(response.success);
            $('#TopWishlistCounter').text(response.countData);
            $('#sectionWishlistPage').html(response.sectionWishlistPage);
        }
    }

    $(document).on('click' ,'.add-to-wishlist', function (event) {
        event.preventDefault();
        var _url = $(this).attr('href');
        actionGetCartAjax($(this),_url,handleDataWishlistAAdd);
    });

    $(document).on('click' ,'.delete-from-wishlist', function (event) {
        event.preventDefault();
        var _url = $(this).attr('href');
        actionGetCartAjax($(this),_url,handleDataWishlistADelete);
    });

    function actionGetCartAjax(_this, _url, handleDataCallback) {
        $.ajax({
            type: "GET",
            url: _url,
            beforeSend: function() {
                $('.loading').removeClass('hide');
            },
            success: function (response) {
                $('.loading').addClass('hide');
                handleDataCallback(_this, response);
            }
        });
    }

    // CHengement des frais de livraison à partir de la ville
    var handleChangeCity = function (_this, response) {
        if(response.sectionOrderInformations){
            $('#orderInformations').html(response.sectionOrderInformations);
            $('.section-cart-total').html(response.sectionCartTotal);
        }
    }

    function actionChangeCityAjax(_this, _url, handleDataCallback) {
        $.ajax({
            type: "GET",
            url: _url,
            beforeSend: function() {
                $('.loading').removeClass('hide');
            },
            success: function (response) {
                $('.loading').addClass('hide');
                handleDataCallback(_this, response);
            }
        });
    }

    $(document).on('change','select[name="city"]', function (event) {
        event.preventDefault();
        _url = "{{url('get-cost-city')}}/" +$(this).val();
        actionChangeCityAjax($(this),_url,handleChangeCity);
    });

    /**
    * Modification  de Quantity de panier
     */
     var handleUpdateQuantityCart = function (_this, response) {
        if(response.success){
            toastr.success(response.success);
            $('#sectionCartPage').html(response.sectionCartPage);
            $('#sectionMiniCart').html(response.sectionMiniCart);
            $('#TopCartCounter').text(response.countData);
            $('#sectionCartPage').html(response.sectionCartPage);
        } else if(response.error) {
            toastr.error(response.error);
        }
    }

    $(document).on('click' ,'.changeQuantity', function (event) {
        event.preventDefault();
        var _url = $(this).attr('href');
        var _data = {
            quantity : $(this).closest('.qty-item').find('input[name="quantity"]').val()
        };
        updateQuantityCart($(this),_url,_data,handleUpdateQuantityCart);
    });

    function updateQuantityCart(_this, _url, _data, handleDataCallback) {
        $.ajax({
            type: "POST",
            url: _url,
            data: _data,
            beforeSend: function() {
                $('.loading').removeClass('hide');
            },
            success: function (response) {
                $('.loading').addClass('hide');
                handleDataCallback(_this, response);
            }
        });
     }


</script>
