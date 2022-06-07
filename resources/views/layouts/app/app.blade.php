<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <meta name="author" content="WEBIDEAL">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/favicon" href="{{ asset('public-assets/image/fevicon.png') }}">


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <!-- END: Vendor CSS-->

    @yield('style')

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- END: Custom CSS-->



</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    @include('layouts.admin.components.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @include('layouts.admin.components.navigation')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper p-0">
            {{ $slot }}
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>

    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/extensions/ext-component-toastr.js') }}"></script>
    <!-- END: Page JS-->
    <script>

        /* show session */
        @if(Session::has('alert-type'))
            $(document).ready(function () {
                    toastr.{{Session::get('alert-type')}}('{{Session::get('message')}}')
            });
        @endif

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script src="{{ asset('assets/js/scripts.js?ver=1.0.0') }}"></script>


    <!-- Read notification  -->
    <script type="text/javascript">
        var _type = "{{ request()->get('type') }}"

        var Modalpage = 1; //track user scroll as page number, right now page number is 1
        var page = 1; //track user scroll as page number, right now page number is 1
        var _onClick = false;

        $(document).on('click','#show-all-notifications', function (event) {
            event.preventDefault();
            if(!_onClick){
                load_more(Modalpage,"#results"); //initial content Popup
            }
            _onClick = true;

        });

        $('#results').scroll(function() { //detect page scroll
            var element = $(this);
            if(element.outerHeight() + element.scrollTop() >= element[0].scrollHeight-1) { //if user scrolled from top to bottom of the page
                Modalpage++; //page number increment
                load_more(Modalpage,"#results"); //load content
            }
        });

        $(window).scroll(function() { //detect page scroll
            // console.log($(window).scrollTop() +'--'+ $(window).height() +'--'+ $(document).height())
            if($(window).scrollTop() + $(window).height() >= $(document).height()-1) { //if user scrolled from top to bottom of the page
                page++; //page number increment

                load_more(page,"#results2"); //initial content load
            }
        });
        // afficher plus des notifications
        function load_more(page,section){

            var _url= '#';

            $.ajax({
                url: _url ,
                type: "get",
                datatype: "html",
                beforeSend: function()
                {
                // $('.ajax-loading').show();
                }
            })
            .done(function(data) {
                if(data.length == 0){
                    //notify user if nothing to load
                    //$('.ajax-loading').html("No more records!");
                    return;
                }
                //$('.ajax-loading').hide(); //hide loading animation once data is received
                $(section).append(data); //append data into #results element
            })
            .fail(function(jqXHR, ajaxOptions, thrownError){
                //alert('No response from server');
            });

        }
        // marquer notification comme lu
        function markNotificationAsRead(_this ) {
            var _notification = _this.attr('data-notification');

            var _url = (_notification) ? '{{ url("users/read-notification/")}}' + '/' +_notification : '{{ url("users/read-notification/0")}}';

            $.ajax({
                url: _url,
                type: 'GET',
            })
            .done(function(data) {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        }
        // marquer comme lu - notification
        $(document).on('click','.read-notifications' ,function (event) {
            event.preventDefault();
            alert('test');
            var _this = $(this);
            markNotificationAsRead(_this);
            return true;
        });

    </script>

    @yield('script')
</body>
<!-- END: Body-->

</html>
