    <!-- header start -->
    <header class="header-area">
        <div class="header-main-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header-main">
                            <!-- logo start -->
                            <div class="header-element logo">
                                <a href="{{ route('index')}}">
                                    <img src="{{ asset('public-assets/image/logo1.png') }}" alt="logo-image" class="img-fluid logo-img">
                                </a>
                            </div>
                            <!-- logo end -->
                            <!-- search start -->
                            <div class="header-element search-wrap">
                                <form action="{{route('searchProduct')}}" method="get">
                                    <input type="text" name="search" placeholder="{{__('search')}} . . .">
                                    {{-- <a href="{{ route('search') }}" class="search-btn"><i class="fa fa-search"></i></a> --}}
                                    <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- search end -->
                            <!-- header-icon start -->
                            <div class="header-element right-block-box">
                                <ul class="shop-element">
                                    <li class="side-wrap nav-toggler">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                                        <span class="line"></span>
                                        </button>
                                    </li>
                                    <li class="side-wrap user-wrap">
                                        @if(Auth::guard('customer')->check())
                                            <div class="user-icon">

                                            </div>
                                            <li class="nav-item dropdown">
                                                <a class="dropdown-toggle user-icon-desk" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                                    <span style="
                                                    font-size: 27px;
                                                    padding-right: 6px;
                                                    vertical-align: middle;
                                                    "><i class="icon-user"></i></span>
                                                    <span class="account-header">{{__('account')}}</span>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <li><a class="dropdown-item" href="{{route('account.orders')}}">{{__('Orders')}}</a></li>
                                                    <li><a class="dropdown-item" href="{{route('account.profile')}}">{{__('Profile')}}</a></li>
                                                    <li><a class="dropdown-item" href="{{route('account.wishlist')}}">{{__('Wishlist')}}</a></li>
                                                    <li><a class="dropdown-item" href="{{route('customer.logout')}}">{{__('Logout')}}</a></li>
                                                </ul>
                                            </li>
                                        @else
                                            <div class="acc-desk">
                                                <div class="user-icon">
                                                    <a href="{{ route('account.orders') }}" class="user-icon-desk">
                                                        <span><i class="icon-user"></i></span>
                                                    </a>
                                                </div>
                                                <div class="user-info">
                                                    <span class="acc-title">{{__('account')}}</span>
                                                    <div class="account-login">
                                                        <a href="{{ route('register') }}">{{__('Register')}}</a>
                                                        <a href="{{ route('login') }}">{{__('Log in')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="acc-mob">
                                                <a href="{{ route('account.orders') }}" class="user-icon">
                                                    <span><i class="icon-user"></i></span>
                                                </a>
                                            </div>
                                        @endif
                                    </li>
                                    <li class="side-wrap wishlist-wrap">
                                        <a href="{{ route('wishlist') }}" class="header-wishlist">
                                            <span class="wishlist-icon"><i class="icon-heart"></i></span>
                                            <span id="TopWishlistCounter" class="wishlist-counter">{{ Cart::instance('wishlist')->count() }}</span>
                                        </a>
                                    </li>
                                    <li class="side-wrap cart-wrap">
                                        <div class="shopping-widget">
                                            <div class="shopping-cart">
                                                <a href="javascript:void(0)" class="cart-count">
                                                    <span class="cart-icon-wrap">
                                                        <span class="cart-icon"><i class="icon-handbag"></i></span>
                                                        <span id="TopCartCounter" class="bigcounter">{{ Cart::instance('cart')->count() }}</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- header-icon end -->
                        </div>
                    </div>
                </div>

            </div>
            <div class="header-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="main-menu-area">
                                <div class="main-navigation navbar-expand-xl">
                                    <div class="box-header menu-close">
                                        <button class="close-box" type="button"><i class="ion-close-round"></i></button>
                                    </div>
                                    <!-- menu start -->
                                    <div class="navbar-collapse" id="navbarContent">
                                        <div class="megamenu-content">
                                            <div class="mainwrap">
                                                @include('layouts.publics.menu')
                                            </div>
                                        </div>
                                    </div>
                                    <!-- menu end -->
                                    @if (1 == 2)
                                    <div class="img-hotline">
                                        <div class="image-line">
                                            <a href="javascript:void(0)"><img src="{{ asset('public-assets/image/icon_contact.png') }}" class="img-fluid" alt="image-icon"></a>
                                        </div>
                                        <div class="image-content">
                                            <span class="hot-l">{{__('Hotline')}}:</span>
                                            <span>0123 456 789</span>
                                        </div>
                                    </div>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mini-cart" id="sectionMiniCart">
            @include('public.cart.partials.section_mini_cart')
        </div>
    </header>
    <!-- header end -->

    <!-- mobile menu start -->
    <div class="header-bottom-area mobile">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="main-menu-area">
                        <div class="main-navigation navbar-expand-xl">
                            <div class="box-header menu-close">
                                <button class="close-box" type="button"><i class="ion-close-round"></i></button>
                            </div>
                            <!-- menu start -->
                            <div class="navbar-collapse" id="navbarContent01">
                                <div class="megamenu-content">
                                    <div class="mainwrap">
                                        @include('layouts.publics.menu')
                                    </div>
                                </div>
                            </div>
                            <!-- menu end -->
                            <div class="img-hotline">
                                <div class="image-line">
                                    <a href="javascript:void(0)"><img src="{{ asset('public-assets/image/icon_contact.png') }}" class="img-fluid" alt="image-icon"></a>
                                </div>
                                <div class="image-content">
                                    <span class="hot-l">Hotline:</span>
                                    <span>0123 456 789</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile menu end -->
