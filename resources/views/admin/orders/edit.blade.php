
<x-app-layout>
    @section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-wizard.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-number-input.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-ecommerce.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-wizard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.css" integrity="sha512-TfnGOYsHIBHwx3Yg6u6jCWhqz79osu5accjEmw8KYID9zfWChaGyjDCmJIdy9fJjpvl9zXxZamkLam0kc5p/YQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .ui-autocomplete{
            background-color: #f8f8f8 !important;
            padding: 1%;
            z-index: 99999;
            float: left;
            width: auto !important
        }
        .ui-menu-item{
            list-style: none;
            cursor: pointer;
        }
    </style>
    @endsection
    @if (!Request::ajax() )
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Updating')}} {{__('of')}} {{ __('order') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Updating')}} {{__('of')}} {{ __('order') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    @if (1 == 2)
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card m-0">
                        <div class="card-header">
                            <h4 class="card-title">{{__('New') }} {{ __('order') }}</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-validation" method="POST" action="{{ route(BASE_ADMIN_PATH.'.orders.update',$order->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.orders.form')
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary me-1">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
     <!-- BEGIN: Content-->
    <div class="ecommerce-application">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper p-0">
            <div class="content-body">
                <div class="bs-stepper checkout-tab-steps">
                    <!-- Wizard starts -->
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#step-address" role="tab" id="step-address-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="home" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">{{ __('Détails') }}</span>
                                    <span class="bs-stepper-subtitle">{{ __('Details Order') }}</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#step-cart" role="tab" id="step-cart-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="shopping-cart" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">{{ __('Products') }}</span>
                                    <span class="bs-stepper-subtitle">{{ __('Products List') }}</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <!-- Wizard ends -->

                    <form id="checkout-form"  class="form form-validation" method="POST" action="{{ route(BASE_ADMIN_PATH.'.orders.update',$order->ref)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="bs-stepper-content">
                            <!-- Checkout Customer Address Starts -->
                            <div id="step-address" class="content" role="tabpanel" aria-labelledby="step-address-trigger">
                                <div id="checkout-address" class="list-view product-checkout details-order">
                                    <!-- Checkout Customer Address Left starts -->
                                    @include('admin.orders.partials.form_delivered_customer')
                                    <!-- Checkout Customer Address Left ends -->

                                    <!-- Checkout Customer Address Right starts -->
                                    <div class="customer-card">
                                        @include('admin.orders.partials.form_order')
                                    </div>
                                    <!-- Checkout Customer Address Right ends -->
                                </div>
                            </div>
                            <!-- Checkout Customer Address Ends -->
                            <!-- Checkout Place order starts -->
                            <div id="step-cart" class="content" role="tabpanel" aria-labelledby="step-cart-trigger">
                                <div id="place-order" class="list-view product-checkout">
                                    <!-- Checkout Place Order Left starts -->
                                    <div class="checkout-items">
                                        <div class="mb-1">
                                            <label class="form-label">{{ __('labels.search')}} </label>
                                            <input placeholder="{{ __('labels.search')}}" id="searchProducts" data-variants="{{ $selectedVariants }}" data-action="{{ route(BASE_ADMIN_PATH .'.products.search')}}" type="text" class="form-control" />
                                        </div>
                                        <div class="all-products-order">
                                            @include('admin.orders.partials.products_order')
                                        </div>
                                    </div>
                                    <!-- Checkout Place Order Left ends -->

                                    <!-- Checkout Place Order Right starts -->
                                    <div class="checkout-options">
                                        @include('admin.orders.partials.details_order')
                                    </div>
                                    <!-- Checkout Place Order Right ends -->
                                </div>
                            </div>
                            <!-- Checkout Place order Ends -->

                        </div>

                    </form>
                    <!-- </div> -->
                </div>
            </div>

        </div>
    </div>
    <!-- END: Content-->

    @section('script')
        <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js?ver=1.0.0') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/pages/app-ecommerce-checkout.js') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/pages/app-touchspin.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

        @include('admin.orders.partials.autocomplete_script')

    @endsection
</x-app-layout>
