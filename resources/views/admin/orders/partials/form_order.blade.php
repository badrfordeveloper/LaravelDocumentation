<div class="card section-form-order">
    <div class="card-header flex-column align-items-start">
        <h4 class="card-title">{{ __('Details Order') }}</h4>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-6 col-12">
                <div class="mb-1">
                    <label class="form-label">{{ __('labels.city_id')}} *</label>
                    <select class="select2 form-select" name="city_id" data-action="{{ route(BASE_ADMIN_PATH.'.cities.index') }}">
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
            @if (@$order->id && 1 == 2)
                <div class="col-md-6 col-12">
                    <div class="mb-1">
                        <label class="form-label">{{ __('labels.amount')}} *</label>
                        <input required value="{{ old('amount', ($order->amount - $order->shipping_cost) ) }}" name="amount" placeholder="{{ __('labels.amount')}}"  type="text" class="form-control" />
                        @if ($errors->has('amount'))
                            <span class="error text-danger" for="amount">{{ $errors->first('amount') }}</span>
                        @endif
                    </div>
                </div>
            @endif

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
                    <label class="form-label">{{ __('labels.comment')}} *</label>
                    <input required value="{{ old('comment', @$order->comment) }}" name="comment" placeholder="{{ __('labels.comment')}}"  type="text" class="form-control" />
                    @if ($errors->has('comment'))
                        <span class="error text-danger" for="comment">{{ $errors->first('comment') }}</span>
                    @endif
                </div>
            </div>

            <button type="button" class="btn btn-primary w-100 btn-next place-order">{{ __('Next') }}</button>

        </div>

    </div>
</div>
