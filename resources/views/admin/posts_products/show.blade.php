<x-app-layout>
    @section('style')
    @endsection
    @if (!Request::ajax() )
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Details')}} {{ __('post') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Details')}} {{ __('post') }}</li>
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
                                    <span class="fw-bolder me-25">{{ __('labels.title') }}</span>
                                    <span>{{ $PostsProduct->render('title') }}</span>
                                </div>
                                <div class="mb-75 col-3">
                                    <span class="fw-bolder me-25">{{ __('labels.created_at') }}</span>
                                    <span>{!! $PostsProduct->render('created_at') !!}</span>
                                </div>
                                <div class="mb-75 col-3">
                                    <span class="fw-bolder me-25">{{ __('labels.active') }}</span>
                                    <span>{!! $PostsProduct->render('active') !!}</span>
                                </div>
                                <div class="mb-75 col-12">
                                    <span class="fw-bolder me-25">{{ __('labels.short_description') }}</span>
                                    <span>{!! $PostsProduct->render('short_description') !!}</span>
                                </div>
                                <div class="mb-75 col-12">
                                    <span class="fw-bolder me-25">{{ __('labels.description') }}</span>
                                    <span>{!! $PostsProduct->render('description') !!}</span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-2">
                                @can('PostsProducts.edit')
                                <a href="{{route(BASE_ADMIN_PATH.'.PostsProducts.edit',$PostsProduct->slug)}}" class="btn btn-primary me-1">
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
