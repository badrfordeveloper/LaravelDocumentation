<x-publics-layout>
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
                                <span>{{__('Wishlist')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- wishlist start -->
    <section class="wishlist-page section-tb-padding">
        <div class="container" id="sectionWishlistPage">
            @include('public.cart.partials.section_whislist_page')
        </div>
    </section>
    <!-- wishlist end -->
</x-publics-layout>
