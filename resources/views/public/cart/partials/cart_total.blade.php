<div class="cart-total">
    <div class="cart-price">
        <span>{{ __('Subtotal') }}</span>
        <span class="total">{{ getForrmattedAmount( Cart::instance('cart')->subtotal() ) }}</span>
    </div>
    <div class="cart-info">
        <h4>{{ __('Shipping info') }}</h4>
        <form>
            <label>{{ __('Country') }}</label>
            <select class="form-select" aria-label="Default select example" name="city" id="city" >
                <option>{{ __('Select a country') }}</option>
                @foreach ($cites as $city )
                    <option @if( isset($selectedCity->id) && $selectedCity->id == $city->id) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
    <div class="shop-total">
        <span>{{ __('Total') }}</span>
        <span class="total-amount">{{ getForrmattedAmount( Cart::instance('cart')->total() + $shippingMethod->cost ) }}</span>
    </div>
    <div class="text-center pt-3">
        <a href="{{ route('checkout') }}" class="btn-style1">{{__('Checkout')}}</a>
    </div>
</div>
