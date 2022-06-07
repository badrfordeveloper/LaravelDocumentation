
<x-app-layout>
    @section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-wizard.css')}}">

    <!-- default icons used in the plugin are from Bootstrap 5.x icon library (which can be enabled by loading CSS below) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

    <!-- alternatively you can use the font awesome icon library if using with `fas` theme (or Bootstrap 4.x) by uncommenting below. -->
    <!-- link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous" -->

    <!-- the fileinput plugin styling CSS file -->
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    @endsection
    @if (!Request::ajax() )
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('New') }} {{__('of')}} {{ __('product') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('New') }} {{__('of')}} {{ __('product') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <form class="form form-validation add-edit-product" method="POST"  action="{{ route(BASE_ADMIN_PATH.'.products.store')}}" enctype="multipart/form-data"  >
                    @csrf
                    <input type="hidden" name="action" value="{{ACTION_CREATE}}">
                    @include('admin.products.form')
                    <div class="card mb-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary me-1 save">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('script')
        <script>
                // changer les valeurs ça depend le type d'attribute
                $(document).on('change','select[name="type"]', function () {
                var _typeProduct = $(this).val();
                var _url ="{{route(BASE_ADMIN_PATH.'.products.viewVariantsByProduct')}}?type="+_typeProduct;
                $.ajax({
                    url: _url,
                    success: function (response) {
                        $('.section-variants').html(response)
                    }
                });
            });
        </script>

         <!-- the main fileinput plugin script JS file -->
         <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/fileinput.min.js"></script>

         <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale)
         <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.5/js/locales/LANG.js"></script> -->

         <script>
             $(document).ready(function() {
                 // For Bootstrap 5.x
                 $("#imagesProduct").fileinput({
                     showUpload: false,
                     layoutTemplates: {
                         main1: "{preview}\n" +
                         "<div class=\'input-group {class}\'>\n" +
                         "   {browse}\n" +
                         "   {upload}\n" +
                         "   {remove}\n" +
                         "   {caption}\n" +
                         "</div>"
                     },
                     allowedFileExtensions: ['jpg', 'png', 'gif','jpeg'],
                 });

             });
         </script>

        <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js?ver=1.0.0') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

        <!-- BEGIN: Page Vendor JS-->
        <script src="https://cdn.tiny.cloud/1/ygro0ptah3nrevlz7hhp3kwv19nhhxqzvoi772o0km2ee3ql/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="{{ asset('app-assets/js/tinymceConfig.js') }}"></script>
        <!-- END: Page Vendor JS-->
        <script>
            (function (window, document, $) {
                'use strict';
                var blogFeatureImage = $('#blog-feature-image');
                var blogImageInput = $('#blogCustomFile');
                // Change featured image
                if (blogImageInput.length) {
                    $(blogImageInput).on('change', function (e) {
                    var reader = new FileReader(),
                        files = e.target.files;
                    reader.onload = function () {
                        if (blogFeatureImage.length) {
                        blogFeatureImage.attr('src', reader.result);
                        }
                    };
                    reader.readAsDataURL(files[0]);
                    });
                }
            })(window, document, jQuery);
        </script>

    @endsection
</x-app-layout>