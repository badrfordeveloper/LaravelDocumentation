

<div class="row">
    <div class="col-md-3 col-12">
        <div class="row">
            <div class="col-md-12 text-center mb-1">
                @php
                    $pathImage = isset($mainImage->path) ? asset(UPLOAD_IMAGES_PATH.$mainImage->path) : asset('app-assets/images/default.jpg');
                @endphp
                <img src="{{$pathImage}}" id="PostsProduct-feature-image" class="rounded mw-100 " height="337" alt="PostsProduct Featured Image" />
            </div>
            <div class="col-md-12">
                <input class="form-control" name="mainImage" type="file" id="PostsProductCustomFile" accept="image/*" />
            </div>
        </div>
    </div>
    <div class="col-md-9 col-12">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="mb-1">
                    <label class="form-label">{{ __('labels.title')}} *</label>
                    <input required value="{{ old('title', @$PostsProduct->title) }}" name="title" placeholder="{{ __('labels.title')}}"  type="text" class="form-control" />
                    @if ($errors->has('title'))
                        <span class="error text-danger" for="title">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label">{{ __('labels.active')}} *</label>
                    <div class="form-check form-switch">
                        <input type="checkbox" @if (old('active',@$PostsProduct->active)) checked @endif name="active" class="form-check-input" id="active" />
                        <label class="form-check-label" for="active"></label>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="mb-1">
                    <label class="form-label">{{ __('labels.short_description')}} *</label>
                    <textarea id="short_description" class="form-control editor" name="short_description">{{ old('short_description', @$PostsProduct->short_description) }}</textarea>
                    @if ($errors->has('short_description'))
                        <span class="error text-danger" for="short_description">{{ $errors->first('short_description') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="mb-1">
                    <label class="form-label">{{ __('labels.description')}} *</label>
                    <textarea id="description" class="form-control editor" name="description">{{ old('description', @$PostsProduct->description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="error text-danger" for="description">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
