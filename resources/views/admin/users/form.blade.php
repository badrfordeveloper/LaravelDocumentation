<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.name')}} *</label>
            <input required value="{{ old('name', @$user->name) }}" name="name" placeholder="{{ __('labels.name')}}"  type="text" class="form-control" />
            @if ($errors->has('name'))
                <span class="error text-danger" for="name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.email')}} *</label>
            <input required value="{{ old('email', @$user->email) }}" name="email" placeholder="{{ __('labels.email')}}"  type="email" class="form-control" />
            @if ($errors->has('email'))
                <span class="error text-danger" for="email">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    @if($formMode == 'create')
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.password')}} *</label>
            <input required value="{{ old('password', @$user->password) }}" name="password" placeholder="{{ __('labels.password')}}"  type="password" class="form-control" />
            @if ($errors->has('password'))
                <span class="error text-danger" for="password">{{ $errors->first('password') }}</span>
            @endif
        </div>
    </div>
    @elseif($formMode == 'edit')
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="mb-1">
                <label class="form-label">{{ __('labels.newPassword')}}</label>
                <div class="form-check form-switch">
                    <input type="checkbox" name="newPassword" class="form-check-input" id="newPassword" />
                    <label class="form-check-label" for="newPassword"></label>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-12" id="divPassword" style="display: none">
            <div class="mb-1">
                <label class="form-label">{{ __('labels.password')}} *</label>
                <input name="password" placeholder="{{ __('labels.password')}}"  type="password" class="form-control" />
                @if ($errors->has('password'))
                    <span class="error text-danger" for="password">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
    </div>
    @endif




    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="role_id">{{ __('labels.role_id')}} *</label>
            <select class="select2 form-select" name="role_id" id="role_id">
                <option value="">{{ __('Select a item') }}</option>
                @foreach ($roles as $role )
                    <option @if(isset($user) && @$user->roles->first()->id  == $role->id) selected @endif value="{{$role->id}}">{{ $role->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('role_id'))
                <span class="error text-danger" for="role_id">{{ $errors->first('role_id') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.active')}} *</label>
            <div class="form-check form-switch">
                <input type="checkbox" @if (@$user->active) checked @endif name="active" class="form-check-input" id="active" />
                <label class="form-check-label" for="active"></label>
            </div>
        </div>
    </div>
</div>
@if($formMode == 'edit')
@push('passwordScript')
<script>
    $("#newPassword").change(function() {
        $("#divPassword").toggle();
    });
</script>
@endpush
@endif
