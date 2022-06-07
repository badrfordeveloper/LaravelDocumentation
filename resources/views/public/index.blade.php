<x-publics-layout>
        <!--home page slider start-->
        <section class="slider">
            <div class="home-slider owl-carousel owl-theme">
                <div class="items">
                    <div class="img-back" style="background-image:url({{ asset('public-assets/image/slider1.jpg')}});">
                        <div class="h-s-content slide-c-c">
                           <!-- <span>Summer vage sale</span>
                            <h1>Fresh fruits<br>&vegetable</h1> -->
                            <a href="grid-list.html" class="btn btn-style1">{{ __('Shop now') }}</a>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="img-back" style="background-image:url({{ asset('public-assets/image/slider2.jpg')}});">
                        <div class="h-s-content slide-c-c">
                            <!--<span>Organic indian masala</span>
                            <h1>Prod of indian<br>100% pacaging</h1>-->
                            <a href="grid-list.html" class="btn btn-style1">{{ __('Shop now') }}</a>
                        </div>
                    </div>
                </div>
                <div class="items">
                    <div class="img-back" style="background-image:url({{ asset('public-assets/image/slider3.jpg')}});">
                        <div class="h-s-content slide-c-c">
                            <!--<span>Top selling!</span>
                            <h1>Fresh for your health</h1>-->
                            <a href="grid-list.html" class="btn btn-style1">{{ __('Shop now') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--home page slider start-->

        <!-- Trending Products Start -->
        <section class="h-t-products1 section-t-padding section-b-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2>{{ __('Everything at a glance') }}</h2>
                        </div>
                        <div class="trending-products owl-carousel owl-theme">
                            @foreach ($products as  $product)
                                <div class="items">
                                    <div class="tred-pro">
                                        <div class="tr-pro-img">
                                            <a href="{{route('product',$product->slug)}}">
                                                @php
                                                    $mainImage = $product->images()->where('type',TYPE_MAIN)->first();
                                                    $pathImage = isset($mainImage->path) ? asset(UPLOAD_IMAGES_PATH.$mainImage->path) : asset('app-assets/images/default.jpg');
                                                @endphp
                                                <img class="img-fluid" src="{{$pathImage}}" alt="pro-img1">
                                                <img class="img-fluid additional-image" src="{{$pathImage}}" alt="additional image">
                                            </a>
                                        </div>
                                        <div class="Pro-lable">
                                            <span class="p-text"> {{__('New')}}</span>
                                        </div>
                                        <div class="pro-icn">
                                            <a href="{{route('addToWishlist',$product->slug)}}" class="w-c-q-icn add-to-wishlist"><i class="fa fa-heart"></i></a>
                                            <a href="{{ route('addToCart',$product->slug) }}" class="w-c-q-icn add-to-cart-link"><i class="fa fa-shopping-bag"></i></a>
                                         {{--    <a href="cart.html" class="w-c-q-icn"><i class="fa fa-shopping-bag"></i></a>
                                            <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                                        --}} </div>
                                    </div>
                                    <div class="caption">
                                        <h3><a href="{{route('product',$product->slug)}}">{{ $product->name }}</a></h3>
                                        <div class="rating">
                                            <i class="fa fa-star c-star"></i>
                                            <i class="fa fa-star c-star"></i>
                                            <i class="fa fa-star c-star"></i>
                                            <i class="fa fa-star c-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="pro-price">
                                            <span class="new-price">{{ $product->defaultVariant()->price }} DH</span>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Trending Products end -->
        @if (1 == 2)
            <!-- Category image slide -->
            <section class="category-img1 section-t-padding section-b-padding">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="section-title">
                                <h2>{{ __('Everything at a glance') }}</h2>
                            </div>
                            <div class="home-category owl-carousel owl-theme">
                                @foreach( $categories as $category )
                                    <div class="items">
                                        <div class="h-cate">
                                            <div class="c-img">
                                                <a href="{{ route('category.products',$category->slug) }}" class="home-cate-img">
                                                    @php
                                                        $mainImage = $category->images()->where('type',TYPE_MAIN)->first();
                                                        $pathImage = isset($mainImage->path) ? asset(UPLOAD_IMAGES_PATH.$mainImage->path) : asset('app-assets/images/default.jpg');
                                                    @endphp
                                                    <img class="img-fluid" src="{{$pathImage}}" alt="{{ $category->name}}">
                                                    <span class="cat-title">{{ $category->name}}</span>
                                                </a>
                                            </div>
                                            <span class="cat-num">{{ $category->name}}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Category image slide -->
        @endif

        <!-- Blog start -->
        <section class="section-tb-padding blog1">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="section-title">
                            <h2> {{ __('Recent news') }} </h2>
                        </div>
                        <div class="home-blog owl-carousel owl-theme">
                            @foreach ($posts as $post )
                                <div class="items">
                                    <div class="blog-start">
                                        <div class="blog-image">
                                            @php
                                                $mainImage = $post->images()->where('type',TYPE_MAIN)->first();
                                                $pathImage = isset($mainImage->path) ? asset(UPLOAD_IMAGES_PATH.$mainImage->path) : asset('app-assets/images/default_blog.jpg');
                                            @endphp
                                            <a href="{{ route('posts.details',$post->slug) }}">
                                                <img src="{{ $pathImage }}" alt="blog-image" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <div class="blog-title">
                                                <h6><a href="{{ route('posts.details',$post->slug) }}">{{ $post->title }}</a></h6>
                                            </div>
                                            @if (1 == 2)
                                            <p class="blog-description">
                                                {!! $post->short_description !!}
                                            </p>
                                            @endif
                                            <a href="{{ route('posts.details',$post->slug) }}" class="read-link">
                                                <span>{{ __('Read more') }}</span>
                                                <i class="ti-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="all-blog">
                            <a href="{{ route('posts')}}" class="btn btn-style1">{{ __('View all') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog end -->


</x-publics-layout>
