<div class="row">
    <div class="col form-floating">
        <div class="wishlist-area">
            <div class="wishlist-details">
                <div class="wishlist-item">
                    <span class="wishlist-head">{{__('My wishlist')}} ({{ $products->count() }})</span>
                    <span class="wishlist-items"></span>
                </div>
            </div>
        </div>
        @foreach ($products as $key => $product)
            @php
                $defaultImage = isset($product->options['defaultImage']) ? @$product->options['defaultImage'] : 'app-assets/images/default.jpg';
            @endphp
            <div class="wishlist-area ajax-section">
                @if (1==2)
                    <div class="d-flex justify-content-center loading-action " style="display: none !important">
                        <div class="spinner-border" role="status">
                        <span class="sr-only">{{__('Loading')}}...</span>
                        </div>
                    </div>
                @endif
                <div class="wishlist-details">
                    <div class="wishlist-all-pro">
                        <div class="wishlist-pro">
                            <div class="wishlist-pro-image">
                                <a href="{{ route('product',$product->options->slug )}}"><img src="{{$defaultImage }}" class="img-fluid img-small" alt="image"></a>
                            </div>
                            <div class="pro-details">
                                <h4><a href="{{ route('product',$product->options->slug )}}">{{ $product->name }}</a></h4>

                                <span class="wishlist-text">{{ $product->options->category }}</span>
                            </div>
                        </div>
                        <div class="pro-btn">
                            <span class="new-price">{{ getForrmattedAmount($product->price) }}</span>
                            <span class="old-price"><del></del></span>
                        </div>

                        <div class="all-pro-price">
                            <a href="{{route('deleteFromWishlist',$key)}}" class="btn btn-danger btn-sm delete-from-wishlist"><i class="fa fa-trash"></i> </a>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
</div>
