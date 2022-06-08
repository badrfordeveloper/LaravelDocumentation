<div class="d-inline-flex">
    <a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown"><i data-feather='more-vertical'></i></a>
    <div class="dropdown-menu dropdown-menu-end">
        @can($slug.'.show')
        <a href="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'show',$item->id)}}" class="dropdown-item ajax-modal"><i data-feather='file-text'></i> Details</a>
        @endcan
        @can($slug.'.delete')
        <a href="#" data-action="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'destroy',$item->id)}}" class="dropdown-item delete-item"><i data-feather='trash-2'></i> {{ __('Delete')}}</a>
        @endcan
    </div>
</div>
@can($slug.'.edit')
<a href="{{ route(BASE_ADMIN_PATH.'.'.$slug.'.'.'edit',$item->id)}}" class="item-edit ajax-modal"><i data-feather='edit'></i></a>
@endcan

<script>
    feather.replace()
  </script>
