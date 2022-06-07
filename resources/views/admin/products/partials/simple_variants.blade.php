<div class="row">
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.quantity')}} *</label>
            <input required value="{{ old('quantity', @$product->variants[0]->quantity) }}" name="quantity" placeholder="{{ __('labels.quantity')}}"  type="text" class="form-control" />
            @if ($errors->has('quantity'))
                <span class="error text-danger" for="sku">{{ $errors->first('quantity') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.price')}} *</label>
            <input required value="{{ old('price', @$product->variants[0]->price) }}" name="price" placeholder="{{ __('labels.price')}}"  type="text" class="form-control" />
            @if ($errors->has('price'))
                <span class="error text-danger" for="sku">{{ $errors->first('price') }}</span>
            @endif
        </div>
    </div>

</div>
