<x-publics-layout>
    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-start">
                        <ul class="breadcrumb-url">
                            <li class="breadcrumb-url-li">
                                <a href="{{ route('index')}}">{{__('Home')}}</a>
                            </li>
                            <li class="breadcrumb-url-li">
                                <span>{{__('Order complete')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- Order complete start -->
    <section class="section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="order-area">
                        <div class="order-price">
                            <ul class="total-order">
                                <li>
                                    <span class="order-no">{{ __('Order ref.') }} {{$order->ref}}</span>
                                    <span class="order-date">{{ $order->render('created_at') }}</span>
                                </li>
                                <li>
                                    <span class="total-price">{{ __('Order Total') }}</span>
                                    <span class="amount">{{  $order->render('amount') }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="order-details">
                            <span class="text-success order-i"><i class="fa fa-check-circle"></i></span>
                            <h4>{{ __('Thank you for order') }}</h4>
                            <span class="order-s">{{ __('Thank you for shopping with us thank you for your trust') }}</span>
                        </div>
                        <div class="order-delivery">
                            <ul class="delivery-payment">
                                @if ( ! is_null($order->deliveredCustomer) )
                                @php
                                    $deliveredCustomer = $order->deliveredCustomer;
                                @endphp
                                    <li class="delivery">
                                        <h5>{{ __('Delivery address') }}</h5>
                                        <p>{{ $deliveredCustomer->first_name }} {{ $deliveredCustomer->last_name }}</p>
                                        <span class="order-span">{{  $deliveredCustomer->render('address') }}</span>
                                        <span class="order-span">{{  $deliveredCustomer->render('city_id') }}</span>
                                        <span class="order-span">{{ $deliveredCustomer->render('postcode') }}</span>
                                        <span class="order-span">{{ __('labels.phone') }}: {{ $deliveredCustomer->render('phone') }} </span>
                                    </li>
                                @endif
                                <li class="pay">
                                    <h5>{{ __('Payment summary') }}</h5>
                                    <span class="order-span p-label">
                                        <span class="n-price">{{ __('labels.amount') }}</span>
                                        <span class="o-price">{{ getForrmattedAmount( ($order->amount - $order->shipping_cost) ) }}</span>
                                    </span>
                                    <span class="order-span p-label">
                                        <span class="n-price">{{ __('Shipping charge') }}</span>
                                        <span class="o-price">{{ $order->render('shipping_cost') }}</span>
                                    </span>
                                    <span class="order-span p-label">
                                        <span class="n-price">{{ __('Order Total') }}</span>
                                        <span class="o-price">{{ $order->render('amount') }}</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order complete end -->
</x-publics-layout>
