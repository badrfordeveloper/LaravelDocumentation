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
                                <span>{{__('My account')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- order history start -->
    <section class="order-histry-area section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="order-history">
                        <div class="profile">
                            <div class="order-pro" style="text-align: center;display: block;">
                                <div class="pro-img">
                             {{--        <a href="javascript:void(0)"><img src="{{ asset('public-assets/image/user-ava.jpg')}}" alt="img" class="img-fluid"></a> --}}
                                    <a href="#"  class="img-fluid">
                                        <span style="font-size: 57px;"><i class="icon-user"></i></span>
                                    </a>
                                </div>
                                <div class="order-name">
                                    <h4>{{ $customer->last_name.' '.$customer->first_name }}</h4>
                                    <span>{{ __('Joined') }} {{ $customer->render('created_at') }}</span>
                                </div>
                            </div>
                            <div class="order-his-page">
                                <ul class="profile-ul">
                                    @php
                                        $currentLink =\Route::current()->getName();
                                    @endphp
                                    <li class="profile-li"><a href="{{route('account.orders')}}" @if($currentLink == 'account.orders') class="active" @endif ><span>{{ __('Orders') }}</span></a></li>
                                    <li class="profile-li"><a href="{{route('account.profile')}}" @if($currentLink == 'account.profile') class="active" @endif>{{ __('Profile') }}</a></li>
                                    <li class="profile-li"><a href="{{route('account.wishlist')}}" @if($currentLink == 'account.wishlist') class="active" @endif><span>{{ __('Wishlist') }}</span></a></li>
                                </ul>
                            </div>
                        </div>
                        @yield('my-content')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- order history end -->
</x-publics-layout>
