<a href="javascript:void(0)" class="shopping-cart-close"><i class="ion-close-round"></i></a>
            <div class="cart-item-title">
                <p>
                    <span class="cart-count-desc">{{__('There are')}}</span>
                    <span class="cart-count-item bigcounter">{{ Cart::instance('cart')->count() }}</span>
                    <span class="cart-count-desc">{{__('Products')}}</span>
                </p>
            </div>
            <ul class="cart-item-loop">
                @foreach (Cart::instance('cart')->content() as $key => $productCart)
                    @php
                        $defaultImage = isset($productCart->options['defaultImage']) ? @$productCart->options['defaultImage'] : 'app-assets/images/default.jpg';
                    @endphp
                    <li class="cart-item">
                        <div class="cart-img">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset($defaultImage) }}" alt="cart-image" class="img-fluid">
                            </a>
                        </div>
                        <div class="cart-title">
                            <h6 class="truncate"><a href="{{ route('product',$productCart->options->slug)}}}">{{ $productCart->name }}</a></h6>
                            @if ($productCart->options->options )
                                <span>{{ $productCart->options->options }}</span>
                            @endif
                            <div class="cart-pro-info">
                                <div class="cart-qty-price">
                                    <span class="quantity">{{$productCart->qty}} x </span>
                                    <span class="price-box">{{ getForrmattedAmount($productCart->price) }}</span>
                                </div>
                                <div class="delete-item-cart">
                                    <a class="text-danger delete-from-cart" href="{{ route('deleteFromCart',$key) }}"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <ul class="subtotal-title-area">
                <li class="subtotal-info">
                    <div class="subtotal-titles">
                        <h6>Sub total:</h6>
                        <span class="subtotal-price">{{ getForrmattedAmount( Cart::instance('cart')->subtotal() )  }}</span>
                    </div>
                </li>
                <li class="mini-cart-btns">
                    <div class="cart-btns">
                        <a href="{{route('cart')}}" class="btn btn-style2">{{ __('View cart') }}</a>
                        <a href="{{route('checkout')}}" class="btn btn-style2">{{ __('Checkout') }}</a>
                    </div>
                </li>
            </ul>
