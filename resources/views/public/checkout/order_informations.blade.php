    <div class="check-pro">
        <h2>{{ __('In your cart') }} {{ $products->count() }}</h2>
        <ul class="check-ul">
            @foreach ($products->content() as $key => $product )
                @php
                    $defaultImage = isset($product->options['defaultImage']) ?  @$product->options['defaultImage'] : 'app-assets/images/default.jpg';
                @endphp
                <li>
                    <div class="check-pro-img">
                        <a href="{{ route('product',$product->options->slug) }}"><img src="{{ asset($defaultImage) }}" class="img-fluid" alt="image"></a>
                    </div>
                    <div class="check-content">
                        <a class="truncate" href="{{ route('product',$product->options->slug) }}">{{ $product->name }}</a>
                        @if ($product->options->options)
                            <span class="check-code-blod">{{ __('Options') }} : <span>{{ $product->options->options }}</span></span>
                        @endif
                        <span class="check-code-blod">{{ __('Quantity') }} : <span>{{ $product->qty }}</span></span>
                        <span class="check-price">{{ getForrmattedAmount($product->price) }}</span>
                    </div>
                </li>

            @endforeach

        </ul>
    </div>
    <h2>{{ __('Your order') }}</h2>
    <ul class="order-history">
        @if (1 == 2)
        <li class="order-details">
            <span>{{ __('Product') }}:</span>
            <span>{{ __('Total') }}</span>
        </li>
            @foreach ($products->content() as $key => $product )
            <li class="order-details">
                <span>{{ $product->name }}:</span>
                <span>{{ $product->price }}</span>
            </li>
            @endforeach

        @endif

        <li class="order-details">
            <span>{{ __('Subtotal') }}:</span>
            <span>{{ getForrmattedAmount( $products->subtotal() ) }}</span>
        </li>
        <li class="order-details">
            <span>{{ __('Shipping Charge') }}:</span>
            <span>{{ getForrmattedAmount($shippingMethod->cost) }}</span>
        </li>
        <li class="order-details">
            <span>{{ __('Payment') }}:</span>
            <span>{{ $paymentMothod->title }}</span>
        </li>
        <li class="order-details">
            <span>{{ __('Total') }}:</span>
            <span>{{ getForrmattedAmount( $products->total() + $shippingMethod->cost ) }}</span>
        </li>
    </ul>
    <div class="checkout-btn d-grid gap-2">
        <button type="submit" class="btn btn-style1">{{ __('Place order') }}</button>
    </div>
