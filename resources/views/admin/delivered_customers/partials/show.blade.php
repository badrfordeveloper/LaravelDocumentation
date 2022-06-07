<div class="info-container">
    <div class="list-unstyled row">
        <div class="mb-75 col-6">
            <span class="fw-bolder me-25">{{ __('first_name') }}</span>
            <span>{{ $deliveredCustomer->render('first_name') }}</span>
        </div>
        <div class="mb-75 col-6">
            <span class="fw-bolder me-25">{{ __('last_name') }}</span>
            <span>{{ $deliveredCustomer->render('last_name') }}</span>
        </div>
        <div class="mb-75 col-6">
            <span class="fw-bolder me-25">{{ __('city_id') }}</span>
            <span>{{ $deliveredCustomer->render('city_id') }}</span>
        </div>
        <div class="mb-75 col-6">
            <span class="fw-bolder me-25">{{ __('phone') }}</span>
            <span>{{ $deliveredCustomer->render('phone') }}</span>
        </div>
        <div class="mb-75 col-6">
            <span class="fw-bolder me-25">{{ __('address') }}</span>
            <span>{{ $deliveredCustomer->render('address') }}</span>
        </div>
        <div class="mb-75 col-6">
            <span class="fw-bolder me-25">{{ __('postcode') }}</span>
            <span>{{ $deliveredCustomer->render('postcode') }}</span>
        </div>
        <div class="mb-75 col-6">
            <span class="fw-bolder me-25">{{ __('email') }}</span>
            <span>{{ $deliveredCustomer->render('email') }}</span>
        </div>
        <div class="mb-75 col-6">
            <span class="fw-bolder me-25">{{ __('customer_id') }}</span>
            <span>{{ $deliveredCustomer->render('customer_id') }}</span>
        </div>

    </div>
    <div class="d-flex justify-content-center pt-2">
        @can('%plural%.edit')
            <a href="{{ route(BASE_ADMIN_PATH . '.delivered_customers.edit', $deliveredCustomer->id) }}"
                class="btn btn-primary me-1 ajax-modal">
                {{ __('Edit') }}
            </a>
        @endcan
    </div>
</div>
