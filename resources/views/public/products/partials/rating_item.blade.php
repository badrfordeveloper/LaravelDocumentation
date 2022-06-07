<div class="customer-reviews">
    {!! $rating->render('rate') !!}
    <!--<span class="p-rating">
        <i class="fa fa-star e-star"></i>
        <i class="fa fa-star e-star"></i>
        <i class="fa fa-star e-star"></i>
        <i class="fa fa-star-o"></i>
        <i class="fa fa-star-o"></i>
    </span> -->
    <h4 class="review-head">{{ $rating->render('title') }}</h4>
    <span class="reviews-editor">{{ $rating->render('name') }} <span class="review-name">on</span> {{ $rating->render('created_at') }}</span>
    <p class="r-description">
        {{ $rating->render('comment') }}
    </p>
</div>
