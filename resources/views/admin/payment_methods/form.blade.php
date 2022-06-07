<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.title')}} *</label>
            <input required value="{{ old('title', @$paymentMethod->title) }}" name="title" placeholder="{{ __('labels.title')}}"  type="text" class="form-control" />
            @if ($errors->has('title'))
                <span class="error text-danger" for="title">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.description')}} *</label>
            <input required value="{{ old('description', @$paymentMethod->description) }}" name="description" placeholder="{{ __('labels.description')}}"  type="text" class="form-control" />
            @if ($errors->has('description'))
            <span class="error text-danger" for="description">{{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.active')}} *</label>
            <div class="form-check form-switch">
                <input type="checkbox" @if (@$paymentMethod->active) checked @endif name="active" class="form-check-input" id="active" />
                <label class="form-check-label" for="active"></label>
            </div>
        </div>
    </div>

</div>
