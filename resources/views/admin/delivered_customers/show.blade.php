<x-app-layout>
    @section('style')
    @endsection
    @if (!Request::ajax())
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">{{ __('Details') }} {{ __('of') }}
                            {{ __('%Model%') }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('Details') }} {{ __('of') }}
                                    {{ __('%Model%') }}</li>
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
                    <div class="card-body">
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">{{ __('Details') }}</h4>
                        @include('admin.delivered_customers.partials.show')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
    @endsection
</x-app-layout>
