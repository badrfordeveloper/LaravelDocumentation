<div class="row">
    <div class="col-md-9">
        <div class="card mb-1">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <label class="form-label">{{ __('labels.name')}} *</label>
                            <input required value="{{ old('name', @$product->name) }}" name="name" placeholder="{{ __('labels.name')}}"  type="text" class="form-control" />
                            @if ($errors->has('name'))
                                <span class="error text-danger" for="name">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 col-12">
                        <div class="mb-1">
                            <label class="form-label">{{ __('labels.description')}} *</label>
                            <textarea id="description" class="form-control editor" name="description">{{ old('description', @$product->description) }}</textarea>
                            @if ($errors->has('description'))
                                <span class="error text-danger" for="description">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label">{{ __('labels.category_id')}} *</label>
                            <select class="select2 form-select" name="category_id">
                                <option value="">{{ ('Select a item') }}</option>
                                @foreach ($categories as $category )
                                    <option @if(old('category_id', @$product->category_id) == $category->id) selected @endif value="{{$category->id}}">{{ $category->getLabel() }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                            <span class="error text-danger" for="input-roles">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="mb-1">
                            <label class="form-label">{{ __('labels.sku')}} *</label>
                            <input required value="{{ old('sku', @$product->sku) }}" name="sku" placeholder="{{ __('labels.sku')}}"  type="text" class="form-control" />
                            @if ($errors->has('sku'))
                                <span class="error text-danger" for="sku">{{ $errors->first('sku') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="mb-1">
                            <label class="form-label">{{ __('labels.isNew')}} *</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" @if (old('isNew',@$product->isNew)) checked @endif name="isNew" class="form-check-input" id="isNew" />
                                <label class="form-check-label" for="isNew"></label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-12">
                        <div class="mb-1">
                            <label class="form-label">{{ __('labels.isFeatured')}} *</label>
                            <div class="form-check form-switch">
                                <input type="checkbox" @if (old('isFeatured',@$product->isFeatured)) checked @endif name="isFeatured" class="form-check-input" id="isFeatured" />
                                <label class="form-check-label" for="isFeatured"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <img src="{{$pathImage}}" id="blog-feature-image" class="rounded mw-100 " height="337" alt="Blog Featured Image" />
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
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Multiple Files Upload</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="file-loading">
                        <input id="imagesProduct" type="file" name="images[]" multiple >
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (1==2)
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Multiple Files Upload</h4>
                    <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                    <input class="form-control" name="images[]" type="file" id="images" multiple  accept="image/*" />
                </div>
                <div class="card-body">
                    <!-- multi file upload starts -->
                    <div action="#" class="dropzone dropzone-area" id="dpz-single-fileeee">
                        <div class="fallback">
                        </div>
                        <div class="dz-message">Drop files here or click to uplooad.</div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
<!-- multi file upload ends -->
<div class="card mb-1">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="mb-1">
                    <label class="form-label">{{ __('labels.type')}} *</label>
                    <select class="select2 form-select" @isset($product->type) disabled @endisset name="type" id="type">
                        <option value="">{{ ('Select a item') }}</option>
                        @foreach ($types as $type )
                            <option @if(old('type', @$product->type) == $type) selected @endif value="{{$type}}">{{ $type }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('type'))
                    <span class="error text-danger" for="input-roles">{{ $errors->first('type') }}</span>
                    @endif
                </div>
            </div>
            <div class="section-variants">
                @if (isset($product->id))
                    @if ($product->type == PRODUCT_VARIANT)
                        @include('admin.products.partials.variable_variants')
                    @else
                        @include('admin.products.partials.simple_variants')
                    @endif
                @else
                    @include('admin.products.partials.simple_variants')
                @endif
            </div>
        </div>
    </div>
</div>
<div class="card mb-1">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="mb-1">
                    <label class="form-label">{{ __('labels.short_description')}} *</label>
                    <textarea id="short_description" class="form-control editor" name="short_description">{{ old('short_description', @$product->short_description) }}</textarea>
                    @if ($errors->has('short_description'))
                        <span class="error text-danger" for="short_description">{{ $errors->first('short_description') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="mb-1">
                    <label class="form-label">{{ __('labels.active')}} *</label>
                    <div class="form-check form-switch">
                        <input type="checkbox" @if (old('active',@$product->active)) checked @endif name="active" class="form-check-input" id="active" />
                        <label class="form-check-label" for="active"></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

