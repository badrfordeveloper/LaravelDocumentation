<div class="grid-pro">
    <ul class="grid-product">
        @foreach ($products as $product)
            <li class="grid-items">
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

                        <a href="{{ route('addToWishlist',$product->slug) }}" class="w-c-q-icn add-to-wishlist"><i class="fa fa-heart"></i></a>
                        <a href="{{ route('addToCart',$product->slug) }}" class="w-c-q-icn add-to-cart-link"><i class="fa fa-shopping-bag"></i></a>
                     {{--    <a href="javascript:void(0)"  class="w-c-q-icn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
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
            </li>
        @endforeach
    </ul>
</div>
<div class="list-all-page">
    <div class="page-number">
        <p>
            {{ __('Displaying') }} {{$products->count()}} sur {{ getForrmattedAmount( $products->total() ) }} {{ __('labels.products') }}(s).
        </p>
        {{ $products->withQueryString()->links() }}
    </div>
</div>
