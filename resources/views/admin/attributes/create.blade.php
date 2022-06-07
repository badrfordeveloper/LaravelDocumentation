
<x-app-layout>
    @section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css')}}">
    @endsection
    @if (!Request::ajax() )
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('New_F') }} {{__('of')}} {{ __('Attribute') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('New_F') }} {{__('of')}} {{ __('Attribute') }}</li>
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
                        <h4 class="card-title">{{__('New') }} {{ __('Attribute') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-validation" method="POST"  action="{{ route(BASE_ADMIN_PATH.'.attributes.store')}}" enctype="multipart/form-data"  >
                            @csrf
                            @include('admin.attributes.form')
                            <div class="form-control-repeater values-by-attribute">
                                @include('admin.options.partials.form_text_options')
                            </div>

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
        <script>
            // load icons
            $(document).ready(function () {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            });
            // changer les valeurs ça depend le type d'attribute
            $(document).on('change','select[name="type"]', function () {
                var _typeAttribute = $(this).val();
                var _url ="{{route(BASE_ADMIN_PATH.'.options.viewOptionsByAttribute')}}?type="+_typeAttribute;
                $.ajax({
                    url: _url,
                    success: function (response) {
                        $('.values-by-attribute').html(response)
                    }
                });
            });
        </script>
        <!-- Script Datattables -->
        <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js?ver=1.0.0') }}"></script>
        <script src="{{ asset('app-assets/js/scripts/forms/form-validation.js') }}"></script>
        <!-- Script Repeter inputs -->
        @if(!Request::ajax())
            @include('admin.attributes.partials.scriptOption')
        @else
            <script>
                counter = 1;
            </script>
        @endif
    @endsection
</x-app-layout>
