<x-app-layout>
    @section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-invoice.css')}}">
    @endsection
    @if (!Request::ajax())
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">{{ __('Details') }} {{ __('of') }}
                            {{ __('Order') }}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ url(BASE_ADMIN_URL) }}">{{ __('Dashboard') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('Details') }} {{ __('of') }}
                                    {{ __('Order') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="content-body">
        <section class="invoice-preview-wrapper">
            <div class="row invoice-preview">
                <!-- Invoice -->
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="card invoice-preview-card">
                        <div class="card-body invoice-padding pb-0">
                            <!-- Header starts -->
                            <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                                <div>
                                    <div class="logo-wrapper">
                                        <svg viewBox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                            <defs>
                                                <linearGradient id="invoice-linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                                    <stop stop-color="#000000" offset="0%"></stop>
                                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                                </linearGradient>
                                                <linearGradient id="invoice-linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                                </linearGradient>
                                            </defs>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-400.000000, -178.000000)">
                                                    <g transform="translate(400.000000, 178.000000)">
                                                        <path class="text-primary" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill: currentColor"></path>
                                                        <path d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#invoice-linearGradient-1)" opacity="0.2"></path>
                                                        <polygon fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                        <polygon fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                        <polygon fill="url(#invoice-linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        <h3 class="text-primary invoice-logo">{{APPLICATION_NAME}}</h3>
                                    </div>
                                    <table>
                                        <tbody>

                                            <tr>
                                                <td class="pe-1">{{__('labels.status')}} :</td>
                                                <td><span class="fw-bold">{!! $order->render('status') !!}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="pe-1">{{__('labels.payment_method_id')}} :</td>
                                                <td><span class="fw-bold">{{ $order->render('payment_method_id')}}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="pe-1">{{__('labels.city_id')}} :</td>
                                                <td><span class="fw-bold">{{ $order->render('city_id')}}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="pe-1">{{__('labels.is_guest')}} :</td>
                                                <td><span class="fw-bold">{!! $order->render('is_guest') !!}</span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="mt-md-0 mt-2">
                                    <h4 class="invoice-title">
                                        Invoice
                                        <span class="invoice-number">#{{ $order->ref}}</span>
                                    </h4>
                                    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title"> {{__('labels.created_at')}} :</p>
                                        <p class="invoice-date">{{ getForrmattedDate($order->created_at)}}</p>
                                    </div>
                                 {{--    <div class="invoice-date-wrapper">
                                        <p class="invoice-date-title">Due Date:</p>
                                        <p class="invoice-date">29/08/2020</p>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- Header ends -->
                        </div>

                        <hr class="invoice-spacing" />

                        <!-- Address and Contact starts -->
                        <div class="card-body invoice-padding pt-0">
                            <div class="row invoice-spacing">
                                <div class="col-xl-8 p-0">
                                    <h6 class="mb-2">{{__('labels.delivred_customer')}}:</h6>
                                    <h6 class="mb-25">{{ $deliveredCustomer->render('last_name') }} {{ $deliveredCustomer->render('first_name') }}</h6>

                                    <p class="card-text mb-25">{{ $deliveredCustomer->render('address') }}</p>
                                    <p class="card-text mb-25">{{ $deliveredCustomer->render('phone') }}</p>
                                    <p class="card-text mb-0">{{ $deliveredCustomer->render('email') }}</p>
                                </div>
                                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                    <h6 class="mb-2">{{__('labels.shipping_info')}}</h6>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="pe-1">{{__('labels.shipping_title')}} :</td>
                                                <td><span class="fw-bold">{{ $order->render('shipping_title')}}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="pe-1">{{__('labels.shipping_cost')}} :</td>
                                                <td><span class="fw-bold">{{ $order->render('shipping_cost')}}</span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Address and Contact ends -->

                        <!-- Invoice Description starts -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="py-1">{{__('labels.products')}}</th>
                                        <th class="py-1">{{__('labels.price')}}</th>
                                        <th class="py-1">{{__('labels.quantity')}}</th>
                                        <th class="py-1">{{__('labels.total')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->variants as $variant )

                                    <tr class="border-bottom">
                                        <td class="py-1">
                                            <p class="card-text fw-bold mb-25">{{ $variant->product->getLabel() }}</p>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">{{ $variant->pivot->price }}</span>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">{{ $variant->pivot->quantity }}</span>
                                        </td>
                                        <td class="py-1">
                                            <span class="fw-bold">{{ $variant->pivot->quantity*$variant->pivot->price }}</span>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="card-body invoice-padding pb-0">
                            <div class="row invoice-sales-total-wrapper">
                                <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                    {{-- <p class="card-text mb-0">
                                        <span class="fw-bold">Salesperson:</span> <span class="ms-75">Alfie Solomons</span>
                                    </p> --}}
                                </div>
                                <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                    <div class="invoice-total-wrapper">
                                       {{--  <div class="invoice-total-item">
                                            <p class="invoice-total-title">{{__('Subtotal')}}:</p>
                                            <p class="invoice-total-amount">{{$order->amount}}</p>
                                        </div>
                                        <div class="invoice-total-item">
                                            <p class="invoice-total-title">Discount:</p>
                                            <p class="invoice-total-amount">$28</p>
                                        </div>
                                        <div class="invoice-total-item">
                                            <p class="invoice-total-title">Tax:</p>
                                            <p class="invoice-total-amount">21%</p>
                                        </div>
                                        <hr class="my-50" />--}}
                                        <div class="invoice-total-item">
                                            <p class="invoice-total-title">{{__('Total')}}:</p>
                                            <p class="invoice-total-amount">{{$order->render('amount')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Invoice Description ends -->

                        <hr class="invoice-spacing" />

                        <!-- Invoice Note starts -->
                        <div class="card-body invoice-padding pt-0">
                            <div class="row">
                                <div class="col-12">
                                    <span class="fw-bold">Note:</span>

                                    <span>{{$order->render('comment')}}</span>
                                </div>
                            </div>
                         {{--    <div class="d-flex justify-content-center pt-2">
                                @can('orders.edit')
                                    <a href="{{ route(BASE_ADMIN_PATH . '.orders.edit', $order->id) }}"
                                        class="btn btn-primary me-1 ajax-modal">
                                        {{ __('Edit') }}
                                    </a>
                                @endcan
                            </div> --}}
                        </div>
                        <!-- Invoice Note ends -->
                    </div>
                </div>

                  <!-- Filled Tabs starts -->
                  <div class="col-xl-12 col-lg-12" id="change-status">
                    <div class="card">
                        <div class="card-body">
                            <!-- Tab panes -->
                            <form id="submit-status" method="POST" action="{{ route(BASE_ADMIN_PATH.".orders.changeStatus")}}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $order->id}}">
                                <input type="hidden" name="status" id="input-status-order" value="">
                                <div class="tab-content pt-1">
                                    <div class="tab-pane active" id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">
                                        <div class="col-12 text-center">
                                            @if($order->status == PENDING)
                                                <button type="submit" @if($order->status == CONFIRMED) disabled @endif value="{{ CONFIRMED }}" class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.CONFIRMED') }}</button>
                                                <button type="submit" @if($order->status == CANCELED) disabled @endif value="{{ CANCELED }}"  class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.CANCELED') }}</button>
                                            @elseif($order->status == CANCELED)
                                                <button type="submit" @if($order->status == PENDING) disabled @endif value="{{ PENDING }}"  class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.PENDING') }}</button>
                                            @elseif($order->status == CONFIRMED)
                                                <button type="submit" @if($order->status == PENDING) disabled @endif value="{{ PENDING }}"  class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.PENDING') }}</button>
                                                <button type="submit" @if($order->status == PROCESSING) disabled @endif value="{{ PROCESSING }}" class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.PROCESSING') }}</button>
                                            @elseif($order->status == PROCESSING)
                                                <button type="submit" @if($order->status == DELIVERED) disabled @endif value="{{ DELIVERED }}"  class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.DELIVERED') }}</button>
                                                <button type="submit" @if($order->status == REJECTED) disabled @endif value="{{ REJECTED }}"  class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.REJECTED') }}</button>
                                                <button type="submit" @if($order->status == CONFIRMED) disabled @endif value="{{ CONFIRMED }}" class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.CONFIRMED') }}</button>
                                            @elseif($order->status == DELIVERED)
                                                <button type="submit" @if($order->status == PROCESSING) disabled @endif value="{{ PROCESSING }}" class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.PROCESSING') }}</button>
                                            @elseif($order->status == REJECTED)
                                                <button type="submit" @if($order->status == PROCESSING) disabled @endif value="{{ PROCESSING }}" class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.PROCESSING') }}</button>
                                                <button type="submit" @if($order->status == RETURNED) disabled @endif value="{{ RETURNED }}" class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.RETURNED') }}</button>
                                            @elseif($order->status == RETURNED)
                                                <button type="submit" @if($order->status == REJECTED) disabled @endif value="{{ REJECTED }}"  class="btn btn-primary me-1 w-100 mt-2 status-button">{{ __('data.REJECTED') }}</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Filled Tabs ends -->
                <!-- /Invoice -->
        </div>
    </div>
    @section('script')
        <script>
            //should base on document
            $(".status-button").click(function(e) {
                e.preventDefault();
                var btn = $(this);
                $('#input-status-order').val(btn.val());
                var form = btn.closest( "form" );
                var url = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: url,
                    data: form.serialize(),
                    beforeSend: function() {
                        btn.prop('disabled', true);
                    },
                    success: function(data) {
                        if($('#view_modal').length){
                            $('#view_modal #url-modal').click();
                        }else{
                            location.reload();
                        }
                    },
                    error: function(reject) {
                        if( reject.status === 422 ) {
                            var errors = $.parseJSON(reject.responseText);
                            $.each(errors.errors, function (key, val) {
                                toastr.error(val[0]);
                            });
                        }else{
                            toastr.error('{{__('messages.ajax_error_global')}}');
                        }
                    },complete: function() {
                        btn.prop('disabled', false);
                    }
                });
            });
        </script>

        @if($errors->has('quantity_out_of_Stock'))
            <script>
                $(document).ready(function () {
                    toastr.error('{{$errors->first('quantity_out_of_Stock')}}')
                });
            </script>
        @endif
    @endsection
</x-app-layout>
