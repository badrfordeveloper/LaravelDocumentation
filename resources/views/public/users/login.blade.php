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
                                <span>{{__('Login')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- login start -->
    <section class="section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="login-area">
                        <div class="login-box">
                            <h1>{{ __('Login') }}</h1>
                            <p>{{ __('Please login below account detail') }}</p>

                            @if(Session::has('alert-type'))
                                <p><span class="error text-{{Session::get('alert-type')}}">{{Session::get('message')}}</span></p>
                            @endif

                            <form method="post" action="{{ route('customer.login') }}">
                                @csrf
                                <label>{{ __('Email') }}</label>
                                <input type="text" name="email" placeholder="Email">
                                <label>{{ __('Password') }}</label>
                                <input type="password" name="password" placeholder="Password">
                                <button type="submit" class="btn-style1">{{ __('Sign in') }}</button>
                            </form>
                        </div>
                        <div class="login-account">
                            <h4>{{ __("Don't have an account?") }}</h4>
                            <a href="{{ route('register') }}" class="ceate-a">{{ __('Create Account') }}</a>
                            <div class="login-info">
                                <a href="terms-conditions.html" class="terms-link"><span>*</span> {{ __('Terms & conditions') }}</a>
                                <p>{{ __('Your privacy and security are important to us. For more information on how we use your data read our') }}<a href="#">{{ __('Privacy policy') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login end -->
</x-publics-layout>
