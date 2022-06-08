@endcan
@can('%plural%.list')
<li><a class="d-flex align-items-center" href="{{ route(BASE_ADMIN_PATH.'.%plural%.index')}}">
    <i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">{{ucfirst(__('%plural%'))}}</span></a>
</li>
@endcan
