    <!-- footer start -->
    <section class="footer-one section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-service section-b-padding">
                        <ul class="service-ul">
                            <li class="service-li">
                                <a href="javascript:void(0)"><i class="fa fa-truck"></i></a>
                                <span>{{__('Free delivery')}}</span>
                            </li>
                            <li class="service-li">
                                <a href="javascript:void(0)"><i class="fa fa-rupee"></i></a>
                                <span>{{__('Cash on delivery')}}</span>
                            </li>
                            <li class="service-li">
                                <a href="javascript:void(0)"><i class="fa fa-refresh"></i></a>
                                <span>{{__('30 Days returns')}}</span>
                            </li>
                            <li class="service-li">
                                <a href="javascript:void(0)"><i class="fa fa-headphones"></i></a>
                                <span>{{__('Online support')}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="f-logo">
                        <ul class="footer-ul">
                            <li class="footer-li footer-logo">
                                <a href="index1.html">
                                    <img class="img-footer" src="{{ asset('public-assets/image/logo1.png') }}" alt="">
                                </a>
                            </li>
                            <li class="footer-li footer-address">
                                <ul class="f-ul-li-ul">
                                    <li class="footer-icon">
                                        <i class="ion-ios-location"></i>
                                    </li>
                                    <li class="footer-info">
                                        <h6>{{__('Address')}}</h6>
                                        <span>401 Broadway 24th floor</span>
                                        <span>Near ant mall cross road</span>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer-li footer-contact">
                                <ul class="f-ul-li-ul">
                                    <li class="footer-icon">
                                        <i class="ion-ios-telephone"></i>
                                    </li>
                                    <li class="footer-info">
                                        <h6>{{__('Contact')}}</h6>
                                        <a href="tel:1-800-222-000">{{__('Phone')}}: 1-800-222-000</a>
                                        <a href="mailto:demo@demo.com">{{__('Email')}}: demo@demo.com</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer-li footer-address">
                                <ul class="f-ul-li-ul">
                                    <li class="footer-icon">
                                        <i class="ion-ios-help"></i>
                                    </li>
                                    <li class="footer-info">
                                        <h6>{{__('Help')}}</h6>
                                        <span>Lorem ipsum is simply</span>
                                        <span>Dummy the printing</span>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-bottom section-t-padding">
                        <div class="footer-link" id="footer-accordian">
                            <div class="f-link">
                                <h2 class="h-footer">{{__('Top categories')}}</h2>
                                <a href="#t-cate" data-bs-toggle="collapse" class="h-footer">
                                    <span>{{__('Top categories')}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="f-link-ul collapse" id="t-cate" data-bs-parent="#footer-accordian">
                                    @php
                                        $categoryCount = 0
                                    @endphp
                                    @foreach( $categories as $category )
                                        @if ($categoryCount < 4)
                                            <li class="f-link-ul-li"><a href="{{ route('category.products',$category->slug) }}" >{{ $category->name}}</a></li>
                                            @php
                                                $categoryCount++;
                                            @endphp
                                        @else
                                            @break
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                            <div class="f-link">
                                <h2 class="h-footer">{{__('Services')}}</h2>
                                <a href="#services" data-bs-toggle="collapse" class="h-footer">
                                    <span>{{__('Services')}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="f-link-ul collapse" id="services" data-bs-parent="#footer-accordian">
                                    <li class="f-link-ul-li"><a href="{{ route('about') }}">{{__('About us')}}</a></li>
                                    <li class="f-link-ul-li"><a href="{{ route('mill') }}">{{__('Moulin')}}</a></li>
                                    <li class="f-link-ul-li"><a href="{{ route('index') }}">{{__('Contact us')}}</a></li>
                                    <li class="f-link-ul-li"><a href="{{ route('floursPosts') }}">{{__('Farinez-vous')}}</a></li>
                                </ul>
                            </div>
                            <div class="f-link">
                                <h2 class="h-footer">{{__('Privacy & terms')}}</h2>
                                <a href="#privacy" data-bs-toggle="collapse" class="h-footer">
                                    <span>{{__('Privacy & terms')}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="f-link-ul collapse" id="privacy" data-bs-parent="#footer-accordian">
                                    <li class="f-link-ul-li"><a href="{{ route('paymentPolicy') }}">{{__('Payment policy')}}</a></li>
                                    <li class="f-link-ul-li"><a href="{{ route('privacyPolicy') }}">{{__('Privacy policy')}}</a></li>
                                    <li class="f-link-ul-li"><a href="{{ route('returnPolicy') }}">{{__('Return policy')}}</a></li>
                                    <li class="f-link-ul-li"><a href="{{ route('shippingPolicy') }}">{{__('Shipping policy')}}</a></li>
                                </ul>
                            </div>
                            @if (1 == 2)
                            <div class="f-link">
                                <h2 class="h-footer">{{__('My account')}}</h2>
                                <a href="#account" data-bs-toggle="collapse" class="h-footer">
                                    <span>{{__('My account')}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="f-link-ul collapse" id="account" data-bs-parent="#footer-accordian">
                                    <li class="f-link-ul-li"><a href="#">{{__('My account')}}</a></li>
                                    <li class="f-link-ul-li"><a href="#">{{__('My cart')}}</a></li>
                                    <li class="f-link-ul-li"><a href="#">{{__('Order history')}}</a></li>
                                    <li class="f-link-ul-li"><a href="#">{{__('My wishlist')}}</a></li>
                                    <li class="f-link-ul-li"><a href="#">{{__('My address')}}</a></li>
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- footer end -->
    <!-- footer copyright start -->
    <section class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="f-bottom">
                        <li class="f-c f-copyright">
                            <p>Copyright <i class="fa fa-copyright"></i> 2021 </p>
                        </li>
                        <li class="f-c f-social">
                            <a href="https://www.whatsapp.com/" class="f-icn-link"><i class="fa fa-whatsapp"></i></a>
                            <a href="https://www.facebook.com/" class="f-icn-link"><i class="fa fa-facebook-f"></i></a>
                            <a href="https://twitter.com/" class="f-icn-link"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.instagram.com/" class="f-icn-link"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.pinterest.com/" class="f-icn-link"><i class="fa fa-pinterest-p"></i></a>
                            <a href="https://www.youtube.com/" class="f-icn-link"><i class="fa fa-youtube"></i></a>
                        </li>
                        <li class="f-c f-payment">
                            <a href="checkout-1.html"><img src="{{ asset('public-assets/image/payment.png') }}" class="img-fluid" alt="payment image"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- footer copyright end -->
    <!-- back to top start -->
    <a href="javascript:void(0)" class="scroll" id="top">
        <span><i class="fa fa-angle-double-up"></i></span>
    </a>
    <!-- back to top end -->
    <div class="mm-fullscreen-bg"></div>
