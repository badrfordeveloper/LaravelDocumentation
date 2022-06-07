<x-app-layout>
    @section('style')
    @endsection
    @if (!Request::ajax() )
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Details')}} {{__('of')}} {{ __('Product') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Details')}} {{__('of')}} {{ __('Product') }}</li>
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
                                    <span class="fw-bolder me-25">{{ __('sku') }}</span>
                                    <span>{{ $product->render('sku') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('code') }}</span>
                                    <span>{{ $product->render('code') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('name') }}</span>
                                    <span>{{ $product->render('name') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('type') }}</span>
                                    <span>{{ $product->render('type') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('isNew') }}</span>
                                    <span>{!! $product->render('isNew') !!}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('isFeatured') }}</span>
                                    <span>{!! $product->render('isFeatured') !!}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('category_id') }}</span>
                                    <span>{{ $product->render('category_id') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('short_description') }}</span>
                                    <span>{!! $product->render('short_description') !!}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('description') }}</span>
                                    <span>{!! $product->render('description') !!}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('active') }}</span>
                                    <span>{!! $product->render('active') !!}</span>
                                </div>

                            </div>
                            <div class="d-flex justify-content-center pt-2">
                                @can('%plural%.edit')
                                <a href="{{route(BASE_ADMIN_PATH.'.products.edit',$product->id)}}" class="btn btn-primary me-1 ajax-modal">
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
