<div class="col-xl-9 col-lg-12 col-md-12 col-xs-12 pro-image">
    <div class="row">
        <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 larg-image">
            <div class="tab-content">
                @php
                    $imagesGalerie = $product->images()->where('type',TYPE_GALERIE)->get();
                @endphp

                @php
                    $mainImage = $product->images()->where('type',TYPE_MAIN)->first();
                    $pathImageMain = isset($mainImage->path) ? asset(UPLOAD_IMAGES_PATH.$mainImage->path) : asset('app-assets/images/default.jpg');
                @endphp
                <div class="tab-pane fade show active" id="image-main">
                    <a href="javascript:void(0)" class="long-img">
                        <figure class="zoom" onmousemove="zoom(event)" style="background-image: url('{{$pathImageMain}}')">
                            <img src="{{$pathImageMain}}" class="img-fluid" alt="image">
                        </figure>
                    </a>

                </div>
                @foreach ($imagesGalerie as $key => $image)
                    <div class="tab-pane fade" id="image-{{$key}}">
                        @php
                            $pathImage = isset($image->path) ? asset(UPLOAD_IMAGES_PATH.$image->path) : asset('app-assets/images/default.jpg');
                        @endphp
                        <a href="javascript:void(0)" class="long-img">
                            <figure class="zoom" onmousemove="zoom(event)" style="background-image: url('{{$pathImage}}')">
                                <img src="{{$pathImage}}" class="img-fluid" alt="image">
                            </figure>
                        </a>
                    </div>
                @endforeach
            </div>
            <ul class="nav nav-tabs pro-page-slider owl-carousel owl-theme">

                <li class="nav-item items">
                    <a class="nav-link show" data-bs-toggle="tab" href="#image-main"><img src="{{$pathImageMain}}" class="img-fluid" alt="image" /></a>
                </li>
                @foreach ($imagesGalerie as $key => $image)
                    @php
                        $pathImage = isset($image->path) ? asset(UPLOAD_IMAGES_PATH.$image->path) : asset('app-assets/images/default.jpg');
                    @endphp
                    <li class="nav-item items">
                        <a class="nav-link" data-bs-toggle="tab" href="#image-{{$key}}"><img src="{{$pathImage}}" class="img-fluid" alt="image"></a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 pro-info">
            <h4 class="truncate">{{$product->name}}</h4>
            <div class="rating">
                <i class="fa fa-star d-star"></i>
                <i class="fa fa-star d-star"></i>
                <i class="fa fa-star d-star"></i>
                <i class="fa fa-star d-star"></i>
                <i class="fa fa-star d-star"></i>
                {{-- <i class="fa fa-star-o"></i> --}}
            </div>
            <div class="pro-availabale">
                <span class="available">{{__('Availability')}}:</span>
                <span class="pro-instock">@if($product->defaultVariant()->quantity > 0) {{__('In stock')}} @else {{__('Out of stock')}} @endif</span>
            </div>
            <div class="pro-price">
                <span class="new-price">{{ $product->defaultVariant()->price }} </span><strong> DH</strong>
            </div>




            <p>{!!$product->short_description!!}</p>
            <form action="{{ route('addToCart',$product->slug) }}" method="POST" class="form-cart">
                <div class="pro-qty">
                    <span class="qty">{{__('Quantity')}}:</span>
                    <div class="plus-minus">
                        <span>
                     {{--        <button href="javascript:void(0)" class="minus-btn text-black">-</button>
                            <input type="text" name="quantity" value="1">
                            <button href="javascript:void(0)" class="plus-btn text-black">+</button> --}}

                            <button @if( $product->defaultVariant()->quantity <= 0) disabled @endif  class="minus-btn text-black" type="button">-</button>
                            <input type="text" @if( $product->defaultVariant()->quantity <= 0) disabled @endif name="quantity" value="1" data-max="{{$product->defaultVariant()->quantity}}">
                            <button @if( $product->defaultVariant()->quantity <= 0) disabled @endif  class="plus-btn text-black"  type="button">+</button>
                        </span>
                    </div>
                </div>
                {{-- products group --}}
                @php
                $productsGroup = $product->productsGroup();
                @endphp
                @if(count($productsGroup)>0)
                    <div style="padding-top: 10px;">
                        @foreach ($productsGroup as $productGroup )
                        <a href="{{route('product',$productGroup->slug)}}"><img src=" {{ asset(UPLOAD_IMAGES_PATH . $productGroup->images[0]->path) }}" height='50px' /> </a>
                        @endforeach
                    </div>
                @endif
                {{-- end products group --}}
                <div class="pro-btn">
                    <a href="{{route('addToWishlist',$product->slug)}}" class="btn btn-style1 add-to-wishlist"><i class="fa fa-heart"></i></a>
                    <button type="submit" class="btn btn-style1 add-to-cart" @if($product->defaultVariant()->quantity <= 0) disabled @endif ><i class="fa fa-shopping-bag"></i> {{__('Add to cart')}}</button>
                </div>
            </form>


            <div class="share">
                <span class="share-lable">{{__('Share')}}:</span>
                <ul class="share-icn">
                    <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
            <div class="pay-img">
                <a href="checkout-1.html">
                    <img src="{{ asset('public-assets/image/pay-image.jpg')}}" class="img-fluid" alt="pay-image">
                </a>
            </div>
        </div>
    </div>
</div>
