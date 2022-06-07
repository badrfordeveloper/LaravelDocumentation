<x-app-layout>
    @section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/app-ecommerce-details.css')}}">
    @endsection
    @if (!Request::ajax() )
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Details')}} {{__('of')}} {{ __('Attribute') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Details')}} {{__('of')}} {{ __('Attribute') }}</li>
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
                                    <span class="fw-bolder me-25">{{ __('labels.name') }}</span>
                                    <span>{{ $attribute->render('name') }}</span>
                                </div>
                                <div class="mb-75 col-6">
                                    <span class="fw-bolder me-25">{{ __('labels.description') }}</span>
                                    <span>{{ $attribute->render('description') }}</span>
                                </div>
                                <div class="mb-75 col-12 ">
                                    <div class="divider divider-start">
                                        <div class="divider-text fw-bolder me-25">{{__('Values List')}}</div>
                                    </div>
                                    <div class="ecommerce-application">
                                        <div class="product-color-options">
                                            <ul class="list-unstyled mb-0">
                                                @if ($attribute->type == TYPE_COLOR )
                                                    @foreach ($attribute->options as $option )
                                                        <li class="d-inline-block">
                                                            <div class="color-option" style="border-color: {{$option->name}}">
                                                                <div class="filloption" style="background-color: {{$option->name}}"></div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                    @else
                                                    @foreach ($attribute->options as $option )
                                                        <li class="d-inline-block">
                                                            <span class="badge badge-light-dark p-50">{{$option->name}}</span>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center pt-2">
                                @can('attributes.edit')
                                <a href="{{route(BASE_ADMIN_PATH.'.attributes.edit',$attribute->id)}}" class="btn btn-primary me-1 ajax-modal">
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
