<div class="section-form">
    <h2>{{ __('Billing details') }}</h2>
    <div class="billing-form">
        <ul class="billing-ul input-2">
            <li class="billing-li">
                <label>{{ __('labels.first_name') }}</label>
                <input type="text" required name="first_name" value = "{{ old('first_name', @$delivredCustomer->first_name) }}" placeholder="{{ __('labels.first_name') }}">
            </li>
            <li class="billing-li">
                <label>{{ __('labels.last_name') }}</label>
                <input type="text" required name="last_name" value = "{{ old('last_name', @$delivredCustomer->last_name) }}" placeholder="{{ __('labels.last_name') }}">
            </li>
        </ul>
        <ul class="billing-ul input-2">
            <li class="billing-li">
                <label>{{ __('labels.city') }}</label>
                <select name="city" id="city" required >
                    <option>{{ __('Select a country') }}</option>

                    @foreach ($cites as $city )

                        <option @if (@$delivredCustomer->city_id ==  $city->id) selected="selected" @endif value="{{ $city->id }}">{{ $city->name }}</option>

                    @endforeach
                </select>
            </li>
            <li class="billing-li">
                <label>{{ __('labels.postcode') }}</label>
                <input type="text" name="postcode" id="postcode" value = "{{ old('postcode', @$delivredCustomer->postcode) }}"  placeholder="{{ __('labels.postcode') }}">
            </li>
        </ul>
        <ul class="billing-ul input-1">
            <li class="billing-li">
                <label>{{ __('labels.address') }}</label>
                <input type="text" required name="address" id="address" value = "{{ old('address', @$delivredCustomer->address) }}"  placeholder="{{ __('labels.address') }}">
            </li>
        </ul>
        <ul class="billing-ul input-2">
            <li class="billing-li">
                <label>{{ __('labels.email') }}</label>
                <input type="email" required name="email" value = "{{ old('email', @$delivredCustomer->email) }}"  placeholder="{{ __('labels.email') }}">
            </li>
            <li class="billing-li">
                <label>{{ __('labels.phone') }}</label>
                <input type="text" required name="phone" value="{{ old('phone', @$delivredCustomer->phone) }}" placeholder="{{ __('labels.phone') }}">
            </li>
        </ul>
        @if ( !Auth::guard('customer')->check())
            <ul class="billing-ul input-2">
                <li class="check-box">
                    <input type="checkbox" id="isAccount" name="--">
                    <label>{{ __('You want to create an account ?') }}</label>
                </li>
            </ul>
            @include('public.checkout.form_account')

        @endif
    </div>
</div>
