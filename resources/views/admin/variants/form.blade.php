<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.price')}} *</label>
            <input required value="{{ old('price', @$variant->price) }}" name="price" placeholder="{{ __('labels.price')}}"  type="text" class="form-control" />
            @if ($errors->has('price'))
                <span class="error text-danger" for="price">{{ $errors->first('price') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.quantity')}} *</label>
            <input required value="{{ old('quantity', @$variant->quantity) }}" name="quantity" placeholder="{{ __('labels.quantity')}}"  type="text" class="form-control" />
            @if ($errors->has('quantity'))
                <span class="error text-danger" for="quantity">{{ $errors->first('quantity') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.active')}} *</label>
            <input required value="{{ old('active', @$variant->active) }}" name="active" placeholder="{{ __('labels.active')}}"  type="text" class="form-control" />
            @if ($errors->has('active'))
                <span class="error text-danger" for="active">{{ $errors->first('active') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.product_id')}} *</label>
            <select class="select2 form-select" name="product_id">
                <option value="">{{ ('Select a item') }}</option>
                @foreach ($products as $product )
                    <option @if(old('product_id', @$variant->product_id) == $product->id) selected @endif value="{{$product->id}}">{{ $product->id }}</option>
                @endforeach
            </select>
            @if ($errors->has('product_id'))
            <span class="error text-danger" for="input-roles">{{ $errors->first('product_id') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.is_default')}} *</label>
            <input required value="{{ old('is_default', @$variant->is_default) }}" name="is_default" placeholder="{{ __('labels.is_default')}}"  type="text" class="form-control" />
            @if ($errors->has('is_default'))
                <span class="error text-danger" for="is_default">{{ $errors->first('is_default') }}</span>
            @endif
        </div>
    </div>

</div>
