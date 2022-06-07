<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.name')}} *</label>
            <input required value="{{ old('name', @$option->name) }}" name="name" placeholder="{{ __('labels.name')}}"  type="text" class="form-control" />
            @if ($errors->has('name'))
                <span class="error text-danger" for="name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.attribute_id')}} *</label>
            <input required value="{{ old('attribute_id', @$option->attribute_id) }}" name="attribute_id" placeholder="{{ __('labels.attribute_id')}}"  type="text" class="form-control" />
            @if ($errors->has('attribute_id'))
                <span class="error text-danger" for="attribute_id">{{ $errors->first('attribute_id') }}</span>
            @endif
        </div>
    </div>

</div>
