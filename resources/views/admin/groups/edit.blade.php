
<x-app-layout>
    @section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css')}}">
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
                    <h2 class="content-header-title float-start mb-0">{{ __('Updating')}} {{__('of')}} {{ __('group') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Updating')}} {{__('of')}} {{ __('group') }}</li>
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
                        <h4 class="card-title">{{__('New') }} {{ __('group') }}</h4>
                    </div>
                    <div class="card-body">
                        <form class="form form-validation" method="POST" action="{{ route(BASE_ADMIN_PATH.'.groups.update',$group->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('admin.groups.form')
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
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        @stack('searchProducts')

    @endsection

</x-app-layout>
