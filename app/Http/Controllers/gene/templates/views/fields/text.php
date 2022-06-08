    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.%column%')}} *</label>
            <input required value="{{ old('%column%', @$%littleModel%->%column%) }}" name="%column%" placeholder="{{ __('labels.%column%')}}"  type="text" class="form-control" />
            @if ($errors->has('%column%'))
                <span class="error text-danger" for="%column%">{{ $errors->first('%column%') }}</span>
            @endif
        </div>
    </div>
