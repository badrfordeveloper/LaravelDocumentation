<x-app-layout>
    @section('style')
    @endsection
    @if (!Request::ajax() )
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Details')}} {{__('of')}} {{ __('Customer') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Details')}} {{__('of')}} {{ __('Customer') }}</li>
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
                        <div class="info-container">
                            <div class="list-unstyled row">
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('labels.first_name') }}</span>
                                    <span>{{ $customer->render('first_name') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('labels.last_name') }}</span>
                                    <span>{{ $customer->render('last_name') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('labels.city_id') }}</span>
                                    <span>{{ $customer->render('city_id') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('labels.phone') }}</span>
                                    <span>{{ $customer->render('phone') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('labels.address') }}</span>
                                    <span>{{ $customer->render('address') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('labels.postcode') }}</span>
                                    <span>{{ $customer->render('postcode') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('labels.email') }}</span>
                                    <span>{{ $customer->render('email') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('labels.active') }}</span>
                                    <span>{!! $customer->render('active') !!}</span>
                                </div>

                            </div>
                            <div class="d-flex justify-content-center pt-2">
                                @can('customers.edit')
                                <a href="{{route(BASE_ADMIN_PATH.'.customers.edit',$customer->id)}}" class="btn btn-primary me-1 ajax-modal">
                                    {{ __('Edit') }}
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
    @endsection
</x-app-layout>
