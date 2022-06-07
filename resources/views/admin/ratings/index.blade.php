
<x-app-layout>
    @section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <style>
        /**
        * style Rating input
        */
        :root {
        --color-gold: #ffc41f;
        --color-gold-light: #ffd560;
        }
        .comment-stars {
        display: flex;
        flex-direction: row-reverse;
        justify-content: left;
        }
        .comment-stars-input {
        display: none;
        }
        .comment-stars-input:checked ~ .comment-stars-view svg ,
        .comment-stars-input:hover ~ .comment-stars-view svg {
        fill: var(--color-gold);
        }
        .comment-stars-input:checked ~ .comment-stars-view:hover svg,
        .comment-stars-input:checked
        ~ .comment-stars-view:hover
        ~ .comment-stars-view
        svg {
        fill: var(--color-gold-light);
        }
        .form-group-rating .comment-stars-view {
            cursor: pointer;
        }
        .comment-stars-view svg {
        fill: #c3c3c7;
        width: 3em;
        height: 3em;
        font-size: 10px;
        }
        .comment-stars-view.is-half {
        transform: translateX(100%);
        margin-left: -0.69580078125em;
        }

        .comment-stars-view.is-half svg {
        width: 1.5em;
        }

        .show-group .comment-stars-view svg {
            width: 18px;
            height: 18px;
        }
        .show-group .comment-stars-view.is-half svg {
        width: 8px;
        }
        .show-group .comment-stars-view{
            cursor: default !important;
        }

        .form-group-rating .comment-stars-view:hover svg,
        .form-group-rating .comment-stars-view:hover ~ .comment-stars-view svg {
        fill: var(--color-gold-light);
        }
        .section-rating{
            display: inline-grid;
        }
        .comment-stars-view{
            margin-bottom: 0px !important;
        }
    </style>
    @endsection


    <div class="content-header row">
        <div class="content-header-left col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{__('List ratings') }}</h2>
                    <div class="breadcrumb-wrapper d-inline-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{__('List ratings') }}</li>
                        </ol>
                    </div>
                    <div class="dt-action-buttons text-end float-end" >
                        @can('ratings.create')
                            <a href="{{route(BASE_ADMIN_PATH.'.ratings.create',$product->slug)}}" class="dt-button create-new btn btn-primary ajax-modal "><span><i data-feather='plus'></i></span></a>
                        @endcan
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section id="column-search-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card p-1">
                                <div class="card-datatable">
                                    <table class="dt-column-search table">
                                        <thead>
                                            <tr>
                                                @foreach ($options->fields as $key => $field )
                                                    <th>{{ ucfirst(__('labels.'.$field['name'])) }}</th>
                                                @endforeach
                                                <th><i data-feather='settings'></i></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @include('partials.modal_ajax')
    @include('partials.modal_delete')

    @section('script')
    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{ asset('app-assets/js/scripts/tables/table-datatables-advanced.js')}}"></script>
    @include('layouts.datatable_script')
    @endsection
</x-app-layout>
