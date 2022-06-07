<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.first_name')}} *</label>
            <input required value="{{ old('first_name', @$customer->first_name) }}" name="first_name" placeholder="{{ __('labels.first_name')}}"  type="text" class="form-control" />
            @if ($errors->has('first_name'))
                <span class="error text-danger" for="first_name">{{ $errors->first('first_name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.last_name')}} *</label>
            <input required value="{{ old('last_name', @$customer->last_name) }}" name="last_name" placeholder="{{ __('labels.last_name')}}"  type="text" class="form-control" />
            @if ($errors->has('last_name'))
                <span class="error text-danger" for="last_name">{{ $errors->first('last_name') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="city_id">{{ __('labels.city_id')}} *</label>
            <select class="select2 form-select" name="city_id" id="city_id">
                <option value="">{{ __('Select a item') }}</option>
                @foreach ($cities as $city )
                    <option @if(@$customer->city_id == $city->id) selected @endif value="{{$city->id}}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.phone')}} *</label>
            <input required value="{{ old('phone', @$customer->phone) }}" name="phone" placeholder="{{ __('labels.phone')}}"  type="text" class="form-control" />
            @if ($errors->has('phone'))
                <span class="error text-danger" for="phone">{{ $errors->first('phone') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.address')}} *</label>
            <input required value="{{ old('address', @$customer->address) }}" name="address" placeholder="{{ __('labels.address')}}"  type="text" class="form-control" />
            @if ($errors->has('address'))
                <span class="error text-danger" for="address">{{ $errors->first('address') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.postcode')}} *</label>
            <input required value="{{ old('postcode', @$customer->postcode) }}" name="postcode" placeholder="{{ __('labels.postcode')}}"  type="text" class="form-control" />
            @if ($errors->has('postcode'))
                <span class="error text-danger" for="postcode">{{ $errors->first('postcode') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.email')}} *</label>
            <input required value="{{ old('email', @$customer->email) }}" name="email" placeholder="{{ __('labels.email')}}"  type="text" class="form-control" />
            @if ($errors->has('email'))
                <span class="error text-danger" for="email">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>

    @if($formMode == 'create')
        <div class="col-md-6 col-12">
            <div class="mb-1">
                <label class="form-label">{{ __('labels.password')}} *</label>
                <input required name="password" placeholder="{{ __('labels.password')}}"  type="password" class="form-control" />
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
                <input required name="password" placeholder="{{ __('labels.password')}}"  type="password" class="form-control" />
                @if ($errors->has('password'))
                    <span class="error text-danger" for="password">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
    </div>
    @endif

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.active')}} *</label>
            <div class="form-check form-switch">
                <input type="checkbox" @if (@$customer->active) checked @endif name="active" class="form-check-input" id="active" />
                <label class="form-check-label" for="active"></label>
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
</div>
