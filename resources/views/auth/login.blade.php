<x-guest-layout>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-cover">
                <div class="auth-inner row m-0">
                    <!-- Brand logo--><a class="brand-logo" href="index.html">
                        <img src="{{ asset('public-assets/image/logo1.png') }}" alt="logo-image" class="img-fluid logo">    
                    </a>
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                            <img class="img-fluid" src="{{ asset('images/login-screen.png') }}" alt="Login" /></div>
                    </div>
                    <!-- /Left Text-->
                    <!-- Login-->
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <h2 class="card-title fw-bold mb-1">{{__('Bienvenue')}} {{__('à')}} {{ APPLICATION_NAME }}! 👋</h2>
                            <p class="card-text mb-2">{{__("Veuillez vous connecter à votre compte et commencer l'aventure")}}</p>
                            <form class="auth-login-form mt-2" method="POST" action="{{ route(BASE_ADMIN_PATH.'.login') }}">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label" for="login-email">{{__('labels.email')}}</label>
                                    <input class="form-control" id="email" type="email" name="email" value="{{old('email')}}" required autofocus />
                                </div>
                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="login-password">{{__('labels.password')}}</label>
                                        @if (Route::has('password.request'))
                                        <a href="{{ route(BASE_ADMIN_PATH.'.password.request') }}"><small> {{ __('Forgot your password?') }}</small></a>
                                        @endif
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge" type="password" name="password" required autocomplete="current-password" />
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" name="remember" id="remember-me" type="checkbox" tabindex="3" />
                                        <label class="form-check-label" for="remember-me"> {{ __('Remember me') }}</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" tabindex="4">{{ __('Se connecter') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
