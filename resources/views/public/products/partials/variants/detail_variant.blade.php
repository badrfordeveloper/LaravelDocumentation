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
    <span class="pro-instock">@if(@$defaultVariant->quantity > 0) {{__('In stock')}} @else {{__('Out of stock')}} @endif</span>
</div>
<div class="pro-price">
    <span class="new-price">@if(isset($isDifferentVariant) && $isDifferentVariant ) {{$minPrice}} - {{$maxPrice}} @else {{ @$defaultVariant->price }}  @endif  </span><strong> DH</strong>
</div>
<p>{!!$product->short_description!!}</p>
 <input type="text" name="product_id" value="{{$product->id}}" style="display: none">
 <input type="text" name="variant_id" value="{{@$defaultVariant->id}}" style="display: none">

@foreach ($attributes as $attribute)
    <div class="pro-items">
        <input type="text" class="my-input-option" name="attribute[{{$attribute->id}}]" id="attribute-{{ $attribute->id }}" value="@if(!@$isDifferentVariant) @foreach($attribute->options as $option)@if(in_array($option->id,$optionsDefaultVariant)) {{$option->id}} @endif @endforeach @endif"
        style="display: none;">

        <span class="pro-size">{{ ucfirst($attribute->name) }}:</span>
        <ul class="pro-wight">
            @foreach($attribute->options as $option)
                @if(in_array($option->id,$myOptions))
                    <li><a href="javascript:void(0)"
                        class="my-option option-{{ $attribute->name }} @if(!@$isDifferentVariant) @if(in_array($option->id,$optionsDefaultVariant)) active @endif @endif"
                        data-class="option-{{ $attribute->name }}"
                        data-id="attribute-{{ $attribute->id }}"
                        data-value="{{ $option->id }}"
                        >{{ $option->name }}</a></li>
                @endif
            @endforeach
        </ul>
    </div>
@endforeach
<div class="pro-qty">
    <span class="qty">{{__('Quantity')}}:</span>
    <div class="plus-minus">
        <span>
            <button @if( @$isDifferentVariant || @$defaultVariant->quantity <= 0) disabled @endif  class="minus-btn text-black" type="button">-</button>
            <input type="text" @if( @$isDifferentVariant || @$defaultVariant->quantity <= 0) disabled @endif name="quantity" value="1" data-max="{{@$defaultVariant->quantity}}">
            <button @if( @$isDifferentVariant || @$defaultVariant->quantity <= 0) disabled @endif  class="plus-btn text-black"  type="button">+</button>
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
    <button type="submit" class="btn btn-style1 add-to-cart" @if( @$isDifferentVariant || @$defaultVariant->quantity <= 0) disabled @endif ><i class="fa fa-shopping-bag"></i> {{__('Add to cart')}}</button>
</div>
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
