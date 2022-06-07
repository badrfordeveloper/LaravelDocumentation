<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.first_name')}} *</label>
            <input required value="{{ old('first_name', @$deliveredCustomer->first_name) }}" name="first_name" placeholder="{{ __('labels.first_name')}}"  type="text" class="form-control" />
            @if ($errors->has('first_name'))
                <span class="error text-danger" for="first_name">{{ $errors->first('first_name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.last_name')}} *</label>
            <input required value="{{ old('last_name', @$deliveredCustomer->last_name) }}" name="last_name" placeholder="{{ __('labels.last_name')}}"  type="text" class="form-control" />
            @if ($errors->has('last_name'))
                <span class="error text-danger" for="last_name">{{ $errors->first('last_name') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.city_id')}} *</label>
            <select class="select2 form-select" name="city_id">
                <option value="">{{ __('Select a item') }}</option>
                @foreach ($cities as $city )
                    <option @if(old('city_id', @$deliveredCustomer->city_id) == $city->id) selected @endif value="{{$city->id}}">{{ $city->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('city_id'))
            <span class="error text-danger" for="input-roles">{{ $errors->first('city_id') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.phone')}} *</label>
            <input required value="{{ old('phone', @$deliveredCustomer->phone) }}" name="phone" placeholder="{{ __('labels.phone')}}"  type="text" class="form-control" />
            @if ($errors->has('phone'))
                <span class="error text-danger" for="phone">{{ $errors->first('phone') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.address')}} *</label>
            <input required value="{{ old('address', @$deliveredCustomer->address) }}" name="address" placeholder="{{ __('labels.address')}}"  type="text" class="form-control" />
            @if ($errors->has('address'))
                <span class="error text-danger" for="address">{{ $errors->first('address') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.postcode')}} *</label>
            <input required value="{{ old('postcode', @$deliveredCustomer->postcode) }}" name="postcode" placeholder="{{ __('labels.postcode')}}"  type="text" class="form-control" />
            @if ($errors->has('postcode'))
                <span class="error text-danger" for="postcode">{{ $errors->first('postcode') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.email')}} *</label>
            <input required value="{{ old('email', @$deliveredCustomer->email) }}" name="email" placeholder="{{ __('labels.email')}}"  type="text" class="form-control" />
            @if ($errors->has('email'))
                <span class="error text-danger" for="email">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.customer_id')}} *</label>
            <select class="select2 form-select" name="customer_id">
                <option value="">{{ __('Select a item') }}</option>
                @foreach ($customers as $customer )
                    <option @if(old('customer_id', @$deliveredCustomer->customer_id) == $customer->id) selected @endif value="{{$customer->id}}">{{ $customer->first_name.' '.$customer->last_name}} </option>
                @endforeach
            </select>
            @if ($errors->has('customer_id'))
            <span class="error text-danger" for="input-roles">{{ $errors->first('customer_id') }}</span>
            @endif
        </div>
    </div>

</div>
