<x-publics-layout>
    @section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <style>
        span.selection{
            display: block;
        }
        span.select2 span.dropdown-wrapper{
            display: block;
        }
        span.selection .select2-selection {

            min-height: 2.714rem;
            padding: 5px;
        }
        .select2-container--classic .select2-selection--single .select2-selection__arrow b, .select2-container--default .select2-selection--single .select2-selection__arrow b {
            margin-left: 0 !important;
    margin-top: 5px !important;
    left: -8px !important;
}
    </style>
    @endsection
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
                                <span>{{__('Register')}}</span>
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
                    <div class="register-area">
                        <div class="register-box">
                            <h1>{{__('Create Account')}}</h1>
                            <p>{{__('Please register below account detail')}}</p>
                            <form method="post" action="{{ route('customer.register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label">{{ __('labels.first_name')}} *</label>
                                            <input required value="{{ old('first_name', @$customer->first_name) }}" name="first_name" placeholder="{{ __('labels.first_name')}}"  type="text" class="form-control" />
                                            @if ($errors->has('first_name'))
                                                <span class="error text-danger" for="first_name">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label">{{ __('labels.last_name')}} *</label>
                                            <input required value="{{ old('last_name', @$customer->last_name) }}" name="last_name" placeholder="{{ __('labels.last_name')}}"  type="text" class="form-control" />
                                            @if ($errors->has('last_name'))
                                                <span class="error text-danger" for="last_name">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label" for="city_id">{{ __('labels.city_id')}} *</label>
                                            <select required class="select2 form-select" name="city_id" id="city_id">
                                                <option value="">{{ __('Select a item') }}</option>
                                                @foreach ($cities as $city )
                                                    <option @if(@$customer->city_id == $city->id) selected @endif value="{{$city->id}}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('city_id'))
                                                <span class="error text-danger" for="city_id">{{ $errors->first('city_id') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label">{{ __('labels.phone')}} *</label>
                                            <input required value="{{ old('phone', @$customer->phone) }}" name="phone" placeholder="{{ __('labels.phone')}}"  type="text" class="form-control" />
                                            @if ($errors->has('phone'))
                                                <span class="error text-danger" for="phone">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label">{{ __('labels.address')}} </label>
                                            <input  value="{{ old('address', @$customer->address) }}" name="address" placeholder="{{ __('labels.address')}}"  type="text" class="form-control" />
                                            @if ($errors->has('address'))
                                                <span class="error text-danger" for="address">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label">{{ __('labels.postcode')}} </label>
                                            <input  value="{{ old('postcode', @$customer->postcode) }}" name="postcode" placeholder="{{ __('labels.postcode')}}"  type="text" class="form-control" />
                                            @if ($errors->has('postcode'))
                                                <span class="error text-danger" for="postcode">{{ $errors->first('postcode') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label">{{ __('labels.email')}} *</label>
                                            <input required value="{{ old('email', @$customer->email) }}" name="email" placeholder="{{ __('labels.email')}}"  type="text" class="form-control" />
                                            @if ($errors->has('email'))
                                                <span class="error text-danger" for="email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label">{{ __('labels.password')}} *</label>
                                            <input required name="password" placeholder="{{ __('labels.password')}}"  type="password" class="form-control" />
                                            @if ($errors->has('password'))
                                                <span class="error text-danger" for="password">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="mb-1">
                                            <label class="form-label">{{ __('labels.password_confirmation')}} *</label>
                                            <input required name="password_confirmation" placeholder="{{ __('labels.password_confirmation')}}"  type="password" class="form-control" />
                                            @if ($errors->has('password_confirmation'))
                                                <span class="error text-danger" for="password_confirmation">{{ $errors->first('password_confirmation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn-style1">{{__('Create')}}</button>
                            </form>
                        </div>
                        <div class="register-account">
                            <h4>{{__('Already an account holder?') }}</h4>
                            <a href="{{ route('login') }}" class="ceate-a">{{__('Log in') }}</a>
                            <div class="register-info">
                                <a href="terms-conditions.html" class="terms-link"><span>*</span> {{__('Terms & conditions') }}</a>
                                <p>{{__('Your privacy and security are important to us. For more information on how we use your data read our') }}<a href="#">{{__('Privacy policy') }}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login end -->
    @section('script')
        <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
        <script>
            $('.select2').select2();
            </script>
    @endsection
</x-publics-layout>
