<div class="row">
    <div class="col-md-3">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="card mb-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 text-center mb-1">
                                @php
                                    $pathImage = isset($mainImage->path) ? asset(UPLOAD_IMAGES_PATH.$mainImage->path) : asset('app-assets/images/default.jpg');
                                @endphp
                                <img src="{{$pathImage}}" id="blog-feature-image" class="rounded mw-100 " height="140" alt="Blog Featured Image" />
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" name="mainImage" type="file" id="blogCustomFile" accept="image/*" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="row">
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label">{{ __('labels.name')}} *</label>
                    <input required value="{{ old('name', @$category->name) }}" name="name" placeholder="{{ __('labels.name')}}"  type="text" class="form-control" />
                    @if ($errors->has('name'))
                        <span class="error text-danger" for="name">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label">{{ __('labels.description')}} *</label>
                    <input value="{{ old('description', @$category->description) }}" name="description" placeholder="{{ __('labels.description')}}"  type="text" class="form-control" />
                    @if ($errors->has('description'))
                        <span class="error text-danger" for="description">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="mb-1">
                    <label class="form-label" for="parent_id">{{ __('labels.parent')}}</label>
                    <select class="form-select" name="parent_id" id="parent_id">
                        <option value="">{{ __('Select a item') }}</option>
                        @foreach ($parents as $parent )
                            <option @if(@$category->parent_id == $parent->id) selected @endif value="{{$parent->id}}">{{ $parent->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>


</div>
