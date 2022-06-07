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
                                <span>{{__('Notre Vision et Mission en 3B')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
     <!-- about content start -->
     <section class="about-content">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="about-title">
                        <h1>
                            Notre Vision et Mission en 3B
                        </h1>
                    </div>
                    <div class="about-details">
                        <!-- TEXT LEFT PARAGRAPHE -->
                        <div class="row">
                            <div class="col-md-6 col-text">
                                <p>
                                   <b> 100% Bon :</b> Igraine s’engage à vous offrir des produits de la meilleure qualité qu’il soit en conservant les goût originaux et atypiques de chacun de nos produits, et en développant de nouveaux mélanges qui vous feront voyager dans une découverte de goût et de saveurs.
                                </p>
                                <p>
                                    <b>100% Bio :</b> Qu’elles soient sans gluten pour les intolérants, moins caloriques pour vos régimes alimentaire ou tout simplement relevée d’un goût original et atypique, nos produits sont 100% organiques. Ils ne subissent aucun ajout d’arômes artificiels, de conservateurs ou tout autre substance chimique. Nos graines sont minutieusement sélectionnées, broyées finement dans un moulin à pierre naturel pour en faire des farines 100% Bio.
                                </p>
                                <p>
                                    100% Bladi : Igraine est une marque 100% marocaine, offrant des produit 100% marocains et dirigée par une équipe marocaine. Nous aimons les produis que nous vendons et faisons tout notre possible pour que vous aimiez nos produits en retour.
                                </p>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('public-assets/image/blog-image/blog-6.jpg') }}" width="100%"  class="p-image" alt="pro-image">
                            </div>
                        </div>
                        <!-- TEXT RIGHT PARAGRAPHE -->
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('public-assets/image/blog-image/blog-6.jpg') }}" width="100%" class="p-image" alt="pro-image">
                            </div>
                            <div class="col-md-6 col-text">
                                <p>
                                    NOTRE ATOUT
                                    Chez Igraine, nous prêtons toute notre attention à la qualité des produits que nous offrons et au service que nous procurons à nos clients. Pour respecter les 3B de nos produits nous nous engageons à vous offrir des produits comme s’ils étaient fait par vos soins.
                                    Pour offrir la meilleure qualité de farine qu’il soit, nous choisissons la meilleure qualité de graine et céréales et nous fabriquons nous même nos farines et nos mélanges comme à la maison grâce à notre Moulin à farine électrique professionnel. Combinant dernières technologies et meules en pierre naturel, notre moulin est capable de broyer tout type de céréales, de graines et de légumineuse, tout en préservant leur aspect naturel et leur goût original. L’imagination est alors sans fin quant aux nombres infinis de farines que nous pouvons vous offrir mais que vous pouvez également nous proposer afin de répondre à vos envies de découverte les plus folles. Retrouvez-nous dans notre rubrique j’ai une suggestion de produit afin de répondre à vos besoins.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about content end -->
    <!-- Trending Products Start -->
    <section class="h-t-products1">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-title justify-text mb-5 mt-5">
                        <p>J’ai une suggestion de produit  Notre équipe est toujours à la recherche de nouvelles idées de produit. Si vous ne trouvez pas votre bonheur dans notre liste de produit pré-requise, nous serons heureux de recevoir vos suggestions de produit. Nous les fabriquerons pour vous afin de répondre à votre besoin et nous les ajouterons, en votre nom, à notre liste de produit afin d’en faire bénéficier d’autre clients.</p>
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


</x-publics-layout>
