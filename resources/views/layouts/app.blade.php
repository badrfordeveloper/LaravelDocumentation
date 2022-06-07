@if (Request::ajax() )
    @include('layouts.app.ajax')
@else
    @include('layouts.app.app')
@endif
