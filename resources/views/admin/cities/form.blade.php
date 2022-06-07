<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.name')}} *</label>
            <input required value="{{ old('name', @$city->name) }}" name="name" placeholder="{{ __('labels.name')}}"  type="text" class="form-control" />
            @if ($errors->has('name'))
                <span class="error text-danger" for="name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label" for="zone_id">{{ __('labels.zone_id')}} *</label>
            <select class="select2 form-select" name="zone_id" id="zone_id">
                <option value="">{{ __('Select a item') }}</option>
                @foreach ($zones as $zone )
                    <option @if(@$city->zone_id == $zone->id) selected @endif value="{{$zone->id}}">{{ $zone->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
