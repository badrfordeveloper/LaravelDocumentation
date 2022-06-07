@php
    $mainImage = $product->images()->where('type',TYPE_MAIN)->first();
    $pathImage = isset($mainImage->path) ? asset(UPLOAD_IMAGES_PATH.$mainImage->path) : asset('app-assets/images/default.jpg');
@endphp
<div class="card ecommerce-card">
    <div class="item-img">
        <a href="{{ route('admin.products.show',$product->slug) }}">
            <img src="{{ $pathImage }}" alt="img-placeholder" />
        </a>
    </div>
    <div class="card-body">
        <div class="item-name">
            <h6 class="mb-0"><a href="{{ route('admin.products.show',$product->slug) }}" class="text-body">{{ $product->name }}</a></h6>
            <span class="item-company"> <a href="#" class="company-name">{{ $product->category->name }}</a></span>
            <input type="hidden" name="variants[{{$variant->id}}][price]" value="{{$variant->price}}" />

        </div>
        <span class="text-success mb-1">{{ __('In Stock') }}</span>
        <div class="item-quantity">
            <span class="quantity-title">{{ __('Quantity') }}:</span>
            <div class="quantity-counter-wrapper">
                <div class="input-group">
                    @php
                        $currentVariantQuantity = 1;
                        if (isset($order->id) && @$order->has('variants')) {
                            $currentVariantQuantity =  @$order->variants->where('id',$variant->id)->first()->pivot->quantity;
                        }
                    @endphp
                    <input type="text" class="quantity-counter" data-min="1" data-max="{{$product->defaultVariant()->quantity}}" name="variants[{{$variant->id}}][quantity]" value="{{ $currentVariantQuantity }}" />
                </div>
            </div>
        </div>
    </div>
    <div class="item-options text-center">
        <div class="item-wrapper">
            <div class="item-cost">
                <h4 class="item-price">{{ $variant->render('price') }}</h4>
            </div>
        </div>
        <button type="button" class="btn btn-light mt-1 remove-item-order" data-current-variant="{{ $variant->id }}">
            <i data-feather="x" class="align-middle me-25"></i>
            <span>{{ __('Remove') }}</span>
        </button>
    </div>
</div>
@if (Request::ajax())
    @include('partials.global_script')
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/app-touchspin.js') }}"></script>

@endif
