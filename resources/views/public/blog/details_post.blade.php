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
                                <span>{{ $post->title }}  </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- blog start -->
    <section class="section-tb-padding blog-page">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="style-2-full-blog-area">
                        <div class="single-image">
                            @php
                                $mainImage = $post->images()->where('type',TYPE_MAIN)->first();
                                $pathImage = isset($mainImage->path) ? asset(UPLOAD_IMAGES_PATH.$mainImage->path) : asset('app-assets/images/default_blog.jpg');
                            @endphp
                            <img src="{{ $pathImage }}" alt="blog-image" class="img-fluid w-100">
                        </div>
                        <div class="row">
                            <div class="col single-blog-content">
                                <div class="single-b-title">
                                    <h4>{{ $post->title }}</h4>
                                </div>
                                <div class="date-edit-comments">
                                    <div class="blog-info-wrap">
                                        <span class="blog-data date">
                                            <i class="icon-clock"></i>
                                            <span class="blog-d-n-c">{{ \Carbon\Carbon::parse($post->created_at)->format('j F Y') }}</span>
                                        </span>

                                    </div>
                                </div>
                                <div class="blog-description">
                                   {!! $post->description !!}
                                </div>

                                <div class="blog-social">
                                    @php
                                        $shareUrl = route('posts.details',$post->slug);
                                    @endphp
                                     <!-- Facebook -->
                                    <a href="https://www.facebook.com/sharer.php?u={{$shareUrl}}" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="https://twitter.com/share?url={{$shareUrl}}" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="whatsapp://send?text={{$shareUrl}}" class="insta"><i class="fa fa-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog end -->
</x-publics-layout>
