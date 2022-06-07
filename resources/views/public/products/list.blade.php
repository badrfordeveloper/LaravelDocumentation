<x-publics-layout>
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-start">
                        <ul class="breadcrumb-url">
                            <li class="breadcrumb-url-li">
                                <a href="{{ route('index')}}">{{__('Home')}}</a>
                            </li>
                            <li class="breadcrumb-url-li">
                                <span>{{ @$currentCategory->name }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- grid-list start -->
    <section class="section-tb-padding">
        <div class="container">

            <form id="filter-form">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-12">
                        @if(isset($searchValue))
                            <input type="text" name="searchValue" value="{{$searchValue}}">
                        @endif
                        <div class="all-filter">
                                <div class="categories-page-filter">
                                    <h4 class="filter-title">{{__('Categories')}}</h4>
                                    <a href="#category-filter" data-bs-toggle="collapse" class="filter-link"><span>Categories </span><i class="fa fa-angle-down"></i></a>
                                    <ul class="all-option collapse" id="category-filter">
                                        @foreach ($categories as  $category)
                                        <li class="grid-list-option">
                                            <input type="checkbox" id="catgories-{{$category->id}}" name="catgories[]" @isset($currentCategory->id)
                                                @if($currentCategory->id == $category->id) checked @endif
                                            @endisset value="{{$category->id}}">
                                              <label  for="catgories-{{$category->id}}" >{{$category->name}}<span class="grid-items">({{$category->countProducts(@$searchValue)}})</span></label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="price-filter">
                                    <h4 class="filter-title">{{__('Filter by price')}}</h4>
                                    <a href="#price-filter" data-bs-toggle="collapse" class="filter-link"><span>{{__('Filter by price')}} </span><i class="fa fa-angle-down"></i></a>
                                    <ul class="all-price collapse" id="price-filter">
                                        <li class="f-price">
                                            <input type="radio" id="price-all" name="price_range" checked value="all">
                                            <label for="price-all">{{__('ALL')}}</label>
                                        </li>
                                        <li class="f-price">
                                            <input type="radio" id="price-0" name="price_range" value="0-100">
                                            <label for="price-0">0-100</label>
                                        </li>
                                        <li class="f-price">
                                            <input type="radio" id="price-100" name="price_range" value="100-200">
                                            <label for="price-100">100-200</label>
                                        </li>
                                        <li class="f-price">
                                            <input type="radio" id="price-200" name="price_range" value="200-300">
                                            <label for="price-200">200-300</label>
                                        </li>
                                    </ul>
                                </div>

                        </div>

                    </div>

                    <div class="col-lg-9 col-md-8 col-12">
                        <div class="grid-list-area">
                            <div class="grid-list-select">
                                <ul class="grid-list">
                                    @if(isset($searchValue))
                                        <li> {{__('les produits ont été trouvés pour la recherche')}} <b>"{{$searchValue}}"</b> </li>
                                    @endif
                                </ul>
                                <ul class="grid-list-selector">
                                    <li>
                                        <label>{{__('Sort by')}}</label>
                                        <select name="order_by" id="order-by">
                                            <option value="createdAsc">{{__('Date new to old')}}</option>
                                            <option value="createdDesc">{{__('Date old to new')}}</option>
                                            <option value="priceAsc">{{__('Price, low to high')}}</option>
                                            <option value="priceDesc">{{__('Price, high to low')}}</option>
                                        </select>
                                    </li>

                                </ul>
                            </div>
                            <div id="list-products">
                                @include('public.products.partials.list_product')
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </section>
    <!-- grid-list start -->
    <!-- quick veiw start -->
    <section class="quick-view">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Product quickview</h5>
                        <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="quick-veiw-area">
                        <div class="quick-image">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="image-1">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image.jpg" class="img-fluid" alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-2">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/prro-page-image01.jpg" class="img-fluid" alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-3">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image1-1.jpg" class="img-fluid" alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-4">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image1.jpg" class="img-fluid" alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-5">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image2.jpg" class="img-fluid" alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-6">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image2-2.jpg" class="img-fluid" alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-7">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image3.jpg" class="img-fluid" alt="image">
                                    </a>
                                </div>
                                <div class="tab-pane fade show" id="image-8">
                                    <a href="javascript:void(0)" class="long-img">
                                        <img src="image/pro-page-image/pro-page-image03.jpg" class="img-fluid" alt="image">
                                    </a>
                                </div>
                            </div>
                            <ul class="nav nav-tabs quick-slider owl-carousel owl-theme">
                                <li class="nav-item items">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#image-1"><img src="image/pro-page-image/image1.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-2"><img src="image/pro-page-image/image2.jpg" class="img-fluid" alt="iamge"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-3"><img src="image/pro-page-image/image3.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-4"><img src="image/pro-page-image/image4.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-5"><img src="image/pro-page-image/image5.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-6"><img src="image/pro-page-image/image6.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-7"><img src="image/pro-page-image/image8.jpg" class="img-fluid" alt="image"></a>
                                </li>
                                <li class="nav-item items">
                                    <a class="nav-link" data-bs-toggle="tab" href="#image-8"><img src="image/pro-page-image/image7.jpg" class="img-fluid" alt="image"></a>
                                </li>
                            </ul>
                        </div>
                        <div class="quick-caption">
                            <h4>Fresh organic reachter</h4>
                            <div class="quick-price">
                                <span class="new-price">$350.00 USD</span>
                                <span class="old-price"><del>$399.99 USD</del></span>
                            </div>
                            <div class="quick-rating">
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star c-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="pro-description">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and</p>
                            </div>
                            <div class="pro-size">
                                <label>Size: </label>
                                <select>
                                    <option>1 ltr</option>
                                    <option>3 ltr</option>
                                    <option>5 ltr</option>
                                </select>
                            </div>
                            <div class="plus-minus">
                                <span>
                                    <a href="javascript:void(0)" class="minus-btn text-black">-</a>
                                    <input type="text" name="name" value="1">
                                    <a href="javascript:void(0)" class="plus-btn text-black">+</a>
                                </span>
                                <a href="cart.html" class="quick-cart"><i class="fa fa-shopping-bag"></i></a>
                                <a href="wishlist.html" class="quick-wishlist"><i class="fa fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- quick veiw end -->

    <!-- footer copyright end -->
    <!-- back to top start -->
    <a href="javascript:void(0)" class="scroll" id="top">
        <span><i class="fa fa-angle-double-up"></i></span>
    </a>
    <!-- back to top end -->
    <div class="mm-fullscreen-bg"></div>

    @section('script')

    <script>
        $("input[type='checkbox'][name='catgories[]']").change(function() {
           sendAjaxFilterForm();
        });
        $("input[type='radio'][name='price_range']").change(function() {
           sendAjaxFilterForm();
        });
        $("#order-by").change(function() {
           sendAjaxFilterForm();
        });
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            sendAjaxFilterForm(page);
        })

        function sendAjaxFilterForm(page=1){
            $.ajax({
                    type: "POST",
                    url: '{{route("filterProducts")}}',
                    data: $("#filter-form").serialize()+ '&page=' + page,

                    beforeSend: function() {
                        $('.loading').removeClass('hide');
                    },
                    success: function(data) {
                        $("#list-products").html(data);
                    },
                    error: function(reject) {
                        if( reject.status === 422 ) {
                            var errors = $.parseJSON(reject.responseText);
                            $.each(errors.errors, function (key, val) {
                                toastr.error(val[0]);
                            });
                        }else{
                            toastr.error('{{__('messages.ajax_error_global')}}');
                        }
                    },complete: function() {
                        $('.loading').addClass('hide');
                    }
                });

        }
         $(".status-button").click(function(e) {
                e.preventDefault();
                var btn = $(this);
                $('#input-status-order').val(btn.val());
                var form = btn.closest( "form" );
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    beforeSend: function() {
                        btn.prop('disabled', true);
                    },
                    success: function(data) {
                        if($('#view_modal').length){
                            $('#view_modal #url-modal').click();
                        }else{
                            location.reload();
                        }
                    },
                    error: function(reject) {
                        if( reject.status === 422 ) {
                            var errors = $.parseJSON(reject.responseText);
                            $.each(errors.errors, function (key, val) {
                                toastr.error(val[0]);
                            });
                        }else{
                            toastr.error('{{__('messages.ajax_error_global')}}');
                        }
                    },complete: function() {
                        btn.prop('disabled', false);
                    }
                });
            });
    </script>


    @endsection
</x-publics-layout>


