<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.name')}} *</label>
            <input required value="{{ old('name', @$tag->name) }}" name="name" placeholder="{{ __('labels.name')}}"  type="text" class="form-control" />
            @if ($errors->has('name'))
                <span class="error text-danger" for="name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.description')}} *</label>
            <input required value="{{ old('description', @$tag->description) }}" name="description" placeholder="{{ __('labels.description')}}"  type="text" class="form-control" />
            @if ($errors->has('description'))
                <span class="error text-danger" for="description">{{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>

</div>
