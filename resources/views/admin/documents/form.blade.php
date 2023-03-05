<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.title')}} *</label>
            <input required value="{{ old('title', @$document->title) }}" name="title" placeholder="{{ __('labels.title')}}"  type="text" class="form-control" />
            @if ($errors->has('title'))
                <span class="error text-danger" for="title">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.short_description')}} *</label>
            <input required value="{{ old('short_description', @$document->short_description) }}" name="short_description" placeholder="{{ __('labels.short_description')}}"  type="text" class="form-control" />
            @if ($errors->has('short_description'))
                <span class="error text-danger" for="short_description">{{ $errors->first('short_description') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.description')}} *</label>


        <textarea id="open-source-plugins" name="description">
            {{ old('description', @$document->description) }}
            </textarea>




            @if ($errors->has('description'))
                <span class="error text-danger" for="description">{{ $errors->first('description') }}</span>
            @endif
        </div>
    </div>

</div>
