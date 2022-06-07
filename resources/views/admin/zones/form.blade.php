<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.name')}} *</label>
            <input required value="{{ old('name', @$zone->name) }}" name="name" placeholder="{{ __('labels.name')}}"  type="text" class="form-control" />
            @if ($errors->has('name'))
                <span class="error text-danger" for="name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="shipping_method_id">{{ __('labels.shipping_method_id')}} *</label>
            <select class="select2 form-select" name="shipping_method_id" id="shipping_method_id">
                <option value="">{{ __('Select a item') }}</option>
                @foreach ($shippingMethods as $shippingMethod )
                    <option @if(@$zone->shipping_method_id == $shippingMethod->id) selected @endif value="{{$shippingMethod->id}}">{{ $shippingMethod->title }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
