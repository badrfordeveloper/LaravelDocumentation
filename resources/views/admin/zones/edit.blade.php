
<x-app-layout>
    @section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    @endsection
    @if (!Request::ajax() )
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Updating')}} {{__('of')}} {{ __('Zone') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Updating')}} {{__('of')}} {{ __('Zone') }}</li>
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
                        <h4 class="card-title">{{__('New') }} {{ __('Zone') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-validation" method="POST" action="{{ route(BASE_ADMIN_PATH.'.zones.update',$zone->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('admin.zones.form')
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
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    @endsection
</x-app-layout>
