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
                                <span>{{__('Articles List')}}</span>
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
                    <div class="blog-style-1-full-grid">
                        @foreach ($posts as $post )

                            <div class="blog-start">
                                <div class="blog-post">
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
                                        <p class="blog-description">
                                            {!! $post->short_description !!}
                                        </p>
                                        <a href="{{ route('posts.details',$post->slug) }}" class="read-link">
                                            <span>{{ __('Read more') }}</span>
                                            <i class="ti-arrow-right"></i>
                                        </a>
                                        @if (1 == 2)
                                        <div class="blog-date-comment">
                                            <span class="blog-date">3 Jan 2021</span>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    <div class="all-page text-center">
                        {{ $posts->links() }}


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog end -->
</x-publics-layout>
