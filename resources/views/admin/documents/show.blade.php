<x-app-layout>
    @section('style')
        <x-tinymce.showcss />
    @endsection
    @if (!Request::ajax() )
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Details')}} {{__('of')}} {{ __('Document') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Details')}} {{__('of')}} {{ __('Document') }}</li>
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
                        <h4 class="fw-bolder border-bottom pb-50 mb-1">{{ $document->render('title')}}</h4>
                        <div class="info-container tinymce">
                            {!! $document->render('description') !!}
                        </div>
                        <div class="d-flex justify-content-center pt-2">
                            @can('attributes.edit')
                            <a href="{{route(BASE_ADMIN_PATH.'.documents.edit',$document->id)}}" class="btn btn-primary me-1">
                                {{ __('Update') }}
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <x-tinymce.showjs />

    @endsection
</x-app-layout>
