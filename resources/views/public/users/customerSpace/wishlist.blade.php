@extends('public.users.account')
@section('my-content')
    {{-- @include('public.users.partials.wishlist') --}}

    <!-- wishlist start -->
    <div class="profile-form">
            @include('public.cart.partials.section_whislist_page',[ 'products' => Cart::instance('wishlist')->content() ])
    </div>
    <!-- wishlist end -->

@endsection
