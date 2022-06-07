<div class="row">
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.title')}} *</label>
            <input required value="{{ old('title', @$shippingMethod->title) }}" name="title" placeholder="{{ __('labels.title')}}"  type="text" class="form-control" />
            @if ($errors->has('title'))
                <span class="error text-danger" for="title">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.cost')}} *</label>
            <input required value="{{ old('cost', @$shippingMethod->cost) }}" name="cost" placeholder="{{ __('labels.cost')}}"  type="text" class="form-control" />
            @if ($errors->has('cost'))
                <span class="error text-danger" for="cost">{{ $errors->first('cost') }}</span>
            @endif
        </div>
    </div>

</div>
