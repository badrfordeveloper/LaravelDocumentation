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
                                <span>{{__('Your checkout')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- checkout page start -->
    <section class="section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="{{ route('placeorder')}}" method="POST">
                        @csrf
                        <div class="checkout-area">
                            <div class="billing-area">

                                @include('public.checkout.form_customer_data')

                                <div class="billing-details">
                                    <div class="section-form">
                                        <h2>{{ __('Shipping details') }}</h2>
                                        <ul class="shipping-form">

                                            <li class="comment-area">
                                                <label>{{ __('labels.comment') }}</label>
                                                <textarea name="comment" rows="4" cols="80"></textarea>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="order-area" id="orderInformations">
                            @include('public.checkout.order_informations')
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout page end -->
    @section('script')
    <script>
        $(document).on('change','#isAccount', function (event) {
            event.preventDefault();
            if($(this).is(':checked') ){
                $('.section-account').slideDown();
                $('#password').attr('name', 'password');
            } else {
                $('#password').removeAttr('name');;
                $('.section-account').slideUp();;
            }
        });
    </script>
    @endsection
</x-publics-layout>
