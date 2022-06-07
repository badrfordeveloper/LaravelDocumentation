<x-publics-layout>
    @section('style')
    <style>
        /**
        * style Rating input
        */
        :root {
        --color-gold: #ffc41f;
        --color-gold-light: #ffd560;
        }
        .comment-stars {
        display: flex;
        flex-direction: row-reverse;
        justify-content: left;
        }
        .comment-stars-input {
        display: none;
        }
        .comment-stars-input:checked ~ .comment-stars-view svg ,
        .comment-stars-input:hover ~ .comment-stars-view svg {
        fill: var(--color-gold);
        }
        .comment-stars-input:checked ~ .comment-stars-view:hover svg,
        .comment-stars-input:checked
        ~ .comment-stars-view:hover
        ~ .comment-stars-view
        svg {
        fill: var(--color-gold-light);
        }
        .form-group-rating .comment-stars-view {
            cursor: pointer;
        }
        .comment-stars-view svg {
        fill: #c3c3c7;
        width: 3em;
        height: 3em;
        font-size: 10px;
        }
        .comment-stars-view.is-half {
        transform: translateX(100%);
        margin-left: -0.69580078125em;
        }

        .comment-stars-view.is-half svg {
        width: 1.5em;
        }

        .show-group .comment-stars-view svg {
            width: 18px;
            height: 18px;
        }
        .show-group .comment-stars-view.is-half svg {
        width: 8px;
        }
        .show-group .comment-stars-view{
            cursor: default !important;
        }

        .form-group-rating .comment-stars-view:hover svg,
        .form-group-rating .comment-stars-view:hover ~ .comment-stars-view svg {
        fill: var(--color-gold-light);
        }
        .section-rating{
            display: inline-grid;
        }
        .comment-stars-view{
            margin-bottom: 0px !important;
        }
    </style>
    @endsection
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
                            <span>{{ $product->name }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb end -->
<!-- product info start -->
<section class="section-tb-padding pro-page">
    <div class="container">
        <div class="row">
            @if($product->type == PRODUCT_SAMPLE)
                @include('public.products.partials.sample_product')
            @elseif($product->type == PRODUCT_VARIANT)
                @include('public.products.partials.variant_product')
            @endif

            <div class="col-xl-3 col-lg-12 col-md-12 col-xs-12 pro-shipping">
                <div class="product-service">
                    <div class="icon-title">
                        <span><i class="ti-truck"></i></span>
                        <h4>{{__('Delivery info')}}</h4>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting the printing and typesetting industry.</p>
                </div>
                <div class="product-service">
                    <div class="icon-title">
                        <span><i class="ti-reload"></i></span>
                        <h4>{{__('30 days returns')}}</h4>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting the printing and typesetting industry.</p>
                </div>
                <div class="product-service">
                    <div class="icon-title">
                        <span><i class="ti-id-badge"></i></span>
                        <h4>{{__('10 year warranty')}}</h4>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting the printing and typesetting industry.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product info end -->
 <!-- product page tab start -->
 <section class="section-b-padding pro-page-content">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="pro-page-tab">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-1">{{__('Description')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">{{__('Reviews')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-1">
                            {!!$product->description!!}
                        </div>
                        <div class="tab-pane fade show" id="tab-2">
                            <h4 class="reviews-title">{{__('Customer reviews')}}</h4>
                            <div class="review-form">
                                <form method="POST" action="{{ route('products.rateProduct', $product->slug ) }}" >
                                    @csrf
                                    <label>{{ __('Name') }}</label>
                                    <input type="text" name="name" placeholder="{{ __('Enter your name') }}">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" name="email" placeholder="{{ __('Enter your Email') }}">
                                    <!-- RATING BLOCK -->
                                    <svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                        <symbol id="icon-star" viewBox="0 0 26 28">
                                            <path d="M26 10.109c0 0.281-0.203 0.547-0.406 0.75l-5.672 5.531 1.344 7.812c0.016 0.109 0.016 0.203 0.016 0.313 0 0.406-0.187 0.781-0.641 0.781-0.219 0-0.438-0.078-0.625-0.187l-7.016-3.687-7.016 3.687c-0.203 0.109-0.406 0.187-0.625 0.187-0.453 0-0.656-0.375-0.656-0.781 0-0.109 0.016-0.203 0.031-0.313l1.344-7.812-5.688-5.531c-0.187-0.203-0.391-0.469-0.391-0.75 0-0.469 0.484-0.656 0.875-0.719l7.844-1.141 3.516-7.109c0.141-0.297 0.406-0.641 0.766-0.641s0.625 0.344 0.766 0.641l3.516 7.109 7.844 1.141c0.375 0.063 0.875 0.25 0.875 0.719z"></path>
                                        </symbol>
                                        <symbol id="icon-star-half" viewBox="0 0 13 28">
                                            <path d="M13 0.5v20.922l-7.016 3.687c-0.203 0.109-0.406 0.187-0.625 0.187-0.453 0-0.656-0.375-0.656-0.781 0-0.109 0.016-0.203 0.031-0.313l1.344-7.812-5.688-5.531c-0.187-0.203-0.391-0.469-0.391-0.75 0-0.469 0.484-0.656 0.875-0.719l7.844-1.141 3.516-7.109c0.141-0.297 0.406-0.641 0.766-0.641v0z"></path>
                                        </symbol>
                                        </defs>
                                    </svg>
                                    <label>{{ __('Rating') }}</label>
                                    <div class="comment-stars">
                                        @foreach (Config::get('constants.RATINGS_INFOS') as $rating)
                                        <input class="comment-stars-input" type="radio" name="rate" value="{{$rating['value']}}" id="rating-{{$rating['value']}}" >
                                        <label class="comment-stars-view {{$rating['type']}}" for="rating-{{$rating['value']}}">{!! $rating['icon']!!}</label>
                                        @endforeach
                                    </div>
                                    <!-- RATING BLOCK END -->
                                    <label>{{ __('Review title') }}</label>
                                    <input type="text" name="title" placeholder="{{ __('Review title') }}">
                                    <label>{{ __('comment') }}</label>
                                    <textarea name="comment" placeholder="{{ __('comment') }}"></textarea>

                                    <button type="submit" class="btn-style1 save-rating">{{('Send')}}</button>
                                </form>
                            </div>

                            <!-- RATINGS LIST -->
                            <div class="ratings-list">

                                @include('public.products.partials.ratings_list',compact('ratings'))

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product page tab end -->

    <!-- footer copyright end -->
    <!-- back to top start -->
    <a href="javascript:void(0)" class="scroll" id="top">
        <span><i class="fa fa-angle-double-up"></i></span>
    </a>
    <!-- back to top end -->
    <div class="mm-fullscreen-bg"></div>
    @section('script')
        @stack('options')
        <script>
            $(document).on('click','.save-rating', function (event) {
                event.preventDefault();
                var _form = $(this).closest('form');
                var _url = _form.attr("action");
                $.ajax({
                    type: "POST",
                    url: _url,
                    data: _form.serialize() ,
                    beforeSend: function() {
                        $('.loading').removeClass('hide');
                    },
                    success: function (response) {
                        if(response.success){
                            toastr.success(response.message);
                            $('.ratings-list').html(response.ratingsView);
                            _form.trigger("reset");
                        }
                    },complete: function() {
                        $('.loading').addClass('hide');
                    }
                });
            });
        </script>
    @endsection
</x-publics-layout>
