    <div class="card">
        <div class="card-body">
            <div class="price-details">
                <h6 class="price-title">{{('Price Details')}}</h6>
                <ul class="list-unstyled">
                    <li class="price-detail">
                        <div class="detail-title">{{__('Sub Total')}}</div>
                        <div class="detail-amt">{{ (@$order ) ? getForrmattedAmount($order->amount - $order->shipping_cost) : '0 DH' }}</div>
                    </li>
                    <li class="price-detail">
                        <div class="detail-title">{{ __('Delivery Charges') }}</div>
                        <div class="detail-amt discount-amt text-success">{{ (@$order ) ? $order->render('shipping_cost') :  ' 0 DH' }}</div>
                    </li>
                </ul>
                <hr />
                <ul class="list-unstyled">
                    <li class="price-detail">
                        <div class="detail-title detail-total">{{ __('Total') }}</div>
                        <div class="detail-amt fw-bolder">{{ (@$order ) ? $order->render('amount') : '0 DH' }}</div>
                    </li>
                </ul>
                <button type="submit" class="btn btn-primary w-100 btn-next place-order">{{ __('Save') }}</button>
            </div>
        </div>
    </div>
