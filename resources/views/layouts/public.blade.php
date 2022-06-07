<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- title -->
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="Ecommerce"/>
        <meta name="author" content="spacingtech_webify">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- favicon -->
        <link rel="shortcut icon" type="image/favicon" href="{{ asset('public-assets/image/fevicon.png') }}">
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/bootstrap.min.css') }}">
        <!-- simple-line icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/simple-line-icons.css') }}">
        <!-- font-awesome icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/font-awesome.min.css') }}">
        <!-- themify icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/themify-icons.css') }}">
        <!-- ion icon -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/ionicons.min.css') }}">
        <!-- owl slider -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/owl.theme.default.min.css') }}">
        <!-- swiper -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/swiper.min.css') }}">
        <!-- animation -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/animate.css') }}">
        <!-- toastr -->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
        <!-- style -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/style.css?ver=1.0.0') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public-assets/css/responsive.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
        <style>
            .pagination{
                display: inline-flex;
            }
            .page-item.active .page-link {
                background-color: #f5ab1e;
                border-color: #f5ab1e;
            }
            .page-link {
                color: #f5ab1e;
            }
        </style>
        @yield('style')



    </head>
    <body class="home-1">

        <div class="loading hide">
            <div class='uil-ring-css' style='transform:scale(0.79);'>
              <div></div>
            </div>
          </div>

        <!-- BEGIN: Header-->
        @include('layouts.publics.components.header')
        <!-- END: Header-->

        {{ $slot }}

        <!-- BEGIN: Footer-->
        @include('layouts.publics.components.footer')
        <!-- END: Footer-->

        <!-- jquery -->
        <script src="{{ asset('public-assets/js/modernizr-2.8.3.min.js') }}"></script>
        <script src="{{ asset('public-assets/js/jquery-3.6.0.min.js') }}"></script>
        <!-- bootstrap -->
        {{-- <script src="{{ asset('public-assets/js/bootstrap.min.js') }}"></script> --}}
        <!-- popper -->
        <script src="{{ asset('public-assets/js/popper.min.js') }}"></script>
        <!-- fontawesome -->
        <script src="{{ asset('public-assets/js/fontawesome.min.js') }}"></script>
        <!-- owl carousal -->
        <script src="{{ asset('public-assets/js/owl.carousel.min.js') }}"></script>
        <!-- swiper -->
        <script src="{{ asset('public-assets/js/swiper.min.js') }}"></script>
        <!-- toastr -->
        <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
        <!-- custom -->
        <script src="{{ asset('public-assets/js/custom.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
             /* show session */
            @if(Session::has('alert-type'))
                $(document).ready(function () {
                        toastr.{{Session::get('alert-type')}}('{{Session::get('message')}}')
                });
            @endif
        </script>

       @include('public.cart.partials.script_cart_and_wishlist')

        @yield('script')

    </body>
</html>
