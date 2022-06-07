@php
    $itemId = $item->{$item->getRouteKeyName()};
    $className = get_class($item) ;
    $actionsAjax = defined("{$className}::ACTIONS_AJAX") ? $item::ACTIONS_AJAX : Config::get('constants.ACTIONS_AJAX');
    $ajaxShow = in_array(ACTION_SHOW,$actionsAjax) ? 'ajax-modal' : '';
    $ajaxEdit = in_array(ACTION_EDIT,$actionsAjax) ? 'ajax-modal' : '';
@endphp
@if( class_basename($item) == "Order")
    <div class="d-inline-flex">
        <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown"><i data-feather='more-vertical'></i></a>
        <div class="dropdown-menu dropdown-menu-end">
            @can($slug.'.show')
            <a href="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'show',$itemId)}}" class="dropdown-item {{ $ajaxShow }} "><i data-feather='file-text'></i> {{ __('Details') }}</a>
            @endcan
            @if($item->status == PENDING)
                @can($slug.'.delete')
                <a href="#" data-action="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'destroy',$itemId)}}" class="dropdown-item delete-item"><i data-feather='trash-2'></i> {{ __('Delete')}}</a>
                @endcan
            @endif
        </div>
    </div>
    @can($slug.'.edit')
    <a href="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'edit',$itemId)}}" class="item-edit {{ $ajaxEdit }}"><i data-feather='edit'></i></a>
    @endcan
@elseif (class_basename($item) == "Rating")

    <div class="d-inline-flex">
        <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown"><i data-feather='more-vertical'></i></a>
        <div class="dropdown-menu dropdown-menu-end">
            @can($slug.'.show')
            <a href="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'show',['product'=>$item->product->slug,'rating'=>$itemId] )}}" class="dropdown-item {{ $ajaxShow }}"><i data-feather='file-text'></i> {{ __('Details') }}</a>
            @endcan
            @can($slug.'.delete')
            <a href="#" data-action="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'destroy',['product'=>$item->product->slug,'rating'=>$itemId] )}}" class="dropdown-item delete-item"><i data-feather='trash-2'></i> {{ __('Delete')}}</a>
            @endcan
        </div>
    </div>
    @can($slug.'.edit')
    <a href="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'edit',['product'=>$item->product->slug,'rating'=>$itemId] )}}" class="item-edit {{ $ajaxEdit }}"><i data-feather='edit'></i></a>
    @endcan

@else
    <div class="d-inline-flex">
        <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown"><i data-feather='more-vertical'></i></a>
        <div class="dropdown-menu dropdown-menu-end">
            @can($slug.'.show')
            <a href="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'show',$itemId)}}" class="dropdown-item {{ $ajaxShow }}"><i data-feather='file-text'></i> {{ __('Details') }}</a>
            @endcan
            @if( class_basename($item) == "Product")
            @can('ratings.show')
            <a href="{{ route(BASE_ADMIN_PATH.'.ratings.index',$itemId) }}" class="dropdown-item"><i data-feather='star'></i> {{ __('Ratings') }}</a>
            @endcan
            @endif
            @can($slug.'.delete')
            <a href="#" data-action="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'destroy',$itemId)}}" class="dropdown-item delete-item"><i data-feather='trash-2'></i> {{ __('Delete')}}</a>
            @endcan
        </div>
    </div>
    @can($slug.'.edit')
    <a href="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'edit',$itemId)}}" class="item-edit {{ $ajaxEdit }}"><i data-feather='edit'></i></a>
    @endcan
@endif

@include('partials.global_script')
