<div class="row">
    <div class="col-xl-3 col-xs-12 col-sm-12 col-md-12 col-lg-4 section-cart-total">
        @include('public.cart.partials.cart_total')
    </div>
    <div class="col-xl-9 col-xs-12 col-sm-12 col-md-12 col-lg-8">
        <div class="cart-area">
            <div class="cart-details">
                <div class="cart-item">
                    <span class="cart-head">{{__('My cart')}}:</span>
                    <span class="c-items">{{ Cart::instance('cart')->count() }} {{ __('Products') }}</span>
                </div>
            </div>
        </div>
        @foreach ($products as $key => $product)
            @php

                $defaultImage = isset($product->options['defaultImage']) ?@$product->options['defaultImage'] : 'app-assets/images/default.jpg';
                $defaultVariant = \App\Models\Variant::where('id',$product->options->variant)->first();
            @endphp
            <div class="cart-area">
                <div class="cart-details">
                    <div class="cart-all-pro">
                        <div class="cart-pro">
                            <div class="cart-pro-image">
                                <a href="{{ route('product',$product->options->slug)}}"><img src="{{ asset($defaultImage) }}" class=" img-small" alt="image"></a>
                            </div>
                            <div class="pro-details">
                                <h4> <a class="truncate" href="{{ route('product',$product->options->slug)}}">{{ $product->name }}</a></h4>
                                <span class="pro-shop">{{ $product->options->category }}</span>
                                <span class="pro-shop">{{ $product->options->options }}</span>
                                <span class="cart-pro-price">{{ getForrmattedAmount($product->price) }}</span>
                            </div>
                        </div>
                        <div class="qty-item">
                            <div class="center">
                                <div class="plus-minus">
                                    <span>
                                        <a href="{{ route('updateQuantityCartPage',['rowId' => $key,'action' => ACTION_DELETE] ) }}" class="minus-btn text-black changeQuantity">-</a>
                                        <input type="text" name="quantity" value="{{ $product->qty }}" data-max="{{@$defaultVariant->quantity}}">
                                        <a href="{{ route('updateQuantityCartPage', ['rowId' => $key,'action' => ACTION_CREATE] ) }}" class="plus-btn text-black changeQuantity" >+</a>
                                    </span>
                                </div>
                                <a href="{{route('deleteFromCart',$key)}}" class="pro-remove text-danger delete-from-cart"><i class="fa fa-trash"></i>  {{ __('Remove') }}</a>

                            </div>
                        </div>
                        <div class="all-pro-price">
                            <span>{{ getForrmattedAmount($product->price * $product->qty)  }}</span>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
</div>
