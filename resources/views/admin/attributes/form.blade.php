<div class="row">
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.name')}} *</label>
            <input required value="{{ old('name', @$attribute->name) }}" name="name" placeholder="{{ __('labels.name')}}"  type="text" class="form-control" />
            @if ($errors->has('name'))
                <span class="error text-danger" for="name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.description')}} *</label>
            <input value="{{ old('description', @$attribute->description) }}" name="description" placeholder="{{ __('labels.description')}}"  type="text" class="form-control" />
            @if ($errors->has('description'))
                <span class="error text-danger" for="description">{{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="type">{{ __('labels.type')}}</label>
            <select @if (@$attribute) disabled @endif class="form-select" name="type" id="type">
                @foreach (config('constants.TYPES_ATTRIBUTES') as $type )
                    <option @if(@$attribute->type == $type) selected @endif value="{{$type}}">{{ __($type) }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
