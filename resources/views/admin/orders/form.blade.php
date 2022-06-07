<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.status')}} *</label>
            <input required value="{{ old('status', @$order->status) }}" name="status" placeholder="{{ __('labels.status')}}"  type="text" class="form-control" />
            @if ($errors->has('status'))
                <span class="error text-danger" for="status">{{ $errors->first('status') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.shipping_title')}} *</label>
            <input required value="{{ old('shipping_title', @$order->shipping_title) }}" name="shipping_title" placeholder="{{ __('labels.shipping_title')}}"  type="text" class="form-control" />
            @if ($errors->has('shipping_title'))
                <span class="error text-danger" for="shipping_title">{{ $errors->first('shipping_title') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.shipping_cost')}} *</label>
            <input required value="{{ old('shipping_cost', @$order->shipping_cost) }}" name="shipping_cost" placeholder="{{ __('labels.shipping_cost')}}"  type="text" class="form-control" />
            @if ($errors->has('shipping_cost'))
                <span class="error text-danger" for="shipping_cost">{{ $errors->first('shipping_cost') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.amount')}} *</label>
            <input required value="{{ old('amount', @$order->amount) }}" name="amount" placeholder="{{ __('labels.amount')}}"  type="text" class="form-control" />
            @if ($errors->has('amount'))
                <span class="error text-danger" for="amount">{{ $errors->first('amount') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.payment_method_id')}} *</label>
            <select class="select2 form-select" name="payment_method_id">
                <option value="">{{ __('Select a item') }}</option>
                @foreach ($payment_methods as $payment_method )
                    <option @if(old('payment_method_id', @$order->payment_method_id) == $payment_method->id) selected @endif value="{{$payment_method->id}}">{{ $payment_method->title }}</option>
                @endforeach
            </select>
            @if ($errors->has('payment_method_id'))
            <span class="error text-danger" for="input-roles">{{ $errors->first('payment_method_id') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.delivered_customer_id')}} *</label>
            <select class="select2 form-select" name="delivered_customer_id">
                <option value="">{{ __('Select a item') }}</option>
                @foreach ($delivered_customers as $delivered_customer )
                    <option @if(old('delivered_customer_id', @$order->delivered_customer_id) == $delivered_customer->id) selected @endif value="{{$delivered_customer->id}}">{{ $delivered_customer->first_name }} {{ $delivered_customer->last_name }}</option>
                @endforeach
            </select>
            @if ($errors->has('delivered_customer_id'))
            <span class="error text-danger" for="input-roles">{{ $errors->first('delivered_customer_id') }}</span>
            @endif
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.city_id')}} *</label>
            <select class="select2 form-select" name="city_id">
                <option value="">{{ __('Select a item') }}</option>
                @foreach ($cities as $city )
                    <option @if(old('city_id', @$order->city_id) == $city->id) selected @endif value="{{$city->id}}">{{ $city->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('city_id'))
            <span class="error text-danger" for="input-roles">{{ $errors->first('city_id') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.comment')}} *</label>
            <input required value="{{ old('comment', @$order->comment) }}" name="comment" placeholder="{{ __('labels.comment')}}"  type="text" class="form-control" />
            @if ($errors->has('comment'))
                <span class="error text-danger" for="comment">{{ $errors->first('comment') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.is_guest')}} *</label>
            <input required value="{{ old('is_guest', @$order->is_guest) }}" name="is_guest" placeholder="{{ __('labels.is_guest')}}"  type="text" class="form-control" />
            @if ($errors->has('is_guest'))
                <span class="error text-danger" for="is_guest">{{ $errors->first('is_guest') }}</span>
            @endif
        </div>
    </div>

</div>
