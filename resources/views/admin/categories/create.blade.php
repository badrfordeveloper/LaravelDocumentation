
<x-app-layout>
    @section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css')}}">
    @endsection
    @if (!Request::ajax() )
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('New_F') }} {{__('of')}} {{ __('Category') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('New_F') }} {{__('of')}} {{ __('Category') }}</li>
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
                <div class="card m-0">
                    <div class="card-header">
                        <h4 class="card-title">{{__('New') }} {{ __('Category') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-validation" method="POST"  action="{{ route(BASE_ADMIN_PATH.'.categories.store')}}" enctype="multipart/form-data"  >
                            @csrf
                            @include('admin.categories.form')
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

    @section('script')
        <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js?ver=1.0.0') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>

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
