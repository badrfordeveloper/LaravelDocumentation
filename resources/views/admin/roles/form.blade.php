<div class="row">
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.name') }} *</label>
            <input required value="{{ old('name', @$role->name) }}" name="name" placeholder="{{ __('labels.name') }}"
                type="text" class="form-control" />
            @if ($errors->has('name'))
                <span class="error text-danger" for="name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.display_name') }} *</label>
            <input required value="{{ old('display_name', @$role->display_name) }}" name="display_name"
                placeholder="{{ __('labels.display_name') }}" type="text" class="form-control" />
            @if ($errors->has('display_name'))
                <span class="error text-danger" for="display_name">{{ $errors->first('display_name') }}</span>
            @endif
        </div>
    </div>
        <div class="mb-1">
            <h3>{{ __('labels.Permissions') }} *</h3>
            <div class="row">
            @foreach ($models as $model)
                @php
                    $model = $model->model;
                    $permissionsModel = $permissions->where('model', $model)->sortBy('model');
                @endphp
                <div class="col-md-3">
                    <a data-toggle="collapse" href="#{{ $model }}CollapsePermission" class=""
                        aria-expanded="true">
                        <strong>{{ $model }}</strong>
                    </a>
                    <div class="collapsePermission pl-2 collapse show" id="{{ $model }}CollapsePermission"
                    style="width: 100%;">
                        @foreach ($permissionsModel as $permission)
                            <div class="form-check form-check" style="display: block;">
                                <label class="form-check-label">
                                    <input class="form-check-input" name="permissions[]" type="checkbox"
                                    @if(isset($rolePermissions) && in_array($permission->id,$rolePermissions))
                                    checked
                                    @endif
                                        id="checkbow-{{ $permission->id}}" value="{{ $permission->id}}"> <label for="checkbow-{{ $permission->id}}">{{ $permission->display_name }}</label>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            </div>
        </div>
</div>
