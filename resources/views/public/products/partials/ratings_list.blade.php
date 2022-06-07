@forelse ($ratings as $rating )
    @include('public.products.partials.rating_item',compact('rating'))
@empty
@endforelse
