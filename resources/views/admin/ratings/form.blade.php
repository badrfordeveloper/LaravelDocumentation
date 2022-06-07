<div class="row">
        <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.name')}} *</label>
            <input required value="{{ old('name', @$rating->name) }}" name="name" placeholder="{{ __('labels.name')}}"  type="text" class="form-control" />
            @if ($errors->has('name'))
                <span class="error text-danger" for="name">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.email')}} *</label>
            <input required value="{{ old('email', @$rating->email) }}" name="email" placeholder="{{ __('labels.email')}}"  type="text" class="form-control" />
            @if ($errors->has('email'))
                <span class="error text-danger" for="email">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.title')}} *</label>
            <input required value="{{ old('title', @$rating->title) }}" name="title" placeholder="{{ __('labels.title')}}"  type="text" class="form-control" />
            @if ($errors->has('title'))
                <span class="error text-danger" for="title">{{ $errors->first('title') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-6 col-12">
        <div class="mb-1">

            <!-- RATING BLOCK -->
            <svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                <symbol id="icon-star" viewBox="0 0 26 28">
                    <path d="M26 10.109c0 0.281-0.203 0.547-0.406 0.75l-5.672 5.531 1.344 7.812c0.016 0.109 0.016 0.203 0.016 0.313 0 0.406-0.187 0.781-0.641 0.781-0.219 0-0.438-0.078-0.625-0.187l-7.016-3.687-7.016 3.687c-0.203 0.109-0.406 0.187-0.625 0.187-0.453 0-0.656-0.375-0.656-0.781 0-0.109 0.016-0.203 0.031-0.313l1.344-7.812-5.688-5.531c-0.187-0.203-0.391-0.469-0.391-0.75 0-0.469 0.484-0.656 0.875-0.719l7.844-1.141 3.516-7.109c0.141-0.297 0.406-0.641 0.766-0.641s0.625 0.344 0.766 0.641l3.516 7.109 7.844 1.141c0.375 0.063 0.875 0.25 0.875 0.719z"></path>
                </symbol>
                <symbol id="icon-star-half" viewBox="0 0 13 28">
                    <path d="M13 0.5v20.922l-7.016 3.687c-0.203 0.109-0.406 0.187-0.625 0.187-0.453 0-0.656-0.375-0.656-0.781 0-0.109 0.016-0.203 0.031-0.313l1.344-7.812-5.688-5.531c-0.187-0.203-0.391-0.469-0.391-0.75 0-0.469 0.484-0.656 0.875-0.719l7.844-1.141 3.516-7.109c0.141-0.297 0.406-0.641 0.766-0.641v0z"></path>
                </symbol>
                </defs>
            </svg>
            <label class="form-label">{{ __('labels.rate')}} *</label>
            <div class="comment-stars">
                @foreach (Config::get('constants.RATINGS_INFOS') as $ratingNotes)
                <input class="comment-stars-input" type="radio" @if ( isset($rating->rate) && $ratingNotes['value'] == @$rating->rate) checked @endif name="rate" value="{{$ratingNotes['value']}}" id="rating-{{$ratingNotes['value']}}" >
                <label class="comment-stars-view {{$ratingNotes['type']}}" for="rating-{{$ratingNotes['value']}}">{!! $ratingNotes['icon']!!}</label>
                @endforeach
            </div>
            <!-- RATING BLOCK END -->
            @if ($errors->has('rate'))
                <span class="error text-danger" for="rate">{{ $errors->first('rate') }}</span>
            @endif
        </div>
    </div>
    <div class="col-md-12 col-12">
        <div class="mb-1">
            <label class="form-label">{{ __('labels.comment')}} *</label>
            <textarea name="comment" id="comment" rows="8" class="form-control" placeholder="{{ __('labels.comment') }}" >{{ trim(old('comment', @$rating->comment)) }}</textarea>
            @if ($errors->has('comment'))
                <span class="error text-danger" for="comment">{{ $errors->first('comment') }}</span>
            @endif
        </div>
    </div>

</div>
