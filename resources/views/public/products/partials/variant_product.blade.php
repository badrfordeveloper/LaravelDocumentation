<div class="col-xl-9 col-lg-12 col-md-12 col-xs-12 pro-image">
    <form id="detail-form" action="{{ route('addToCart',$product->slug) }}" method="POST" class="form-cart" >
        <div class="row">
            <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 larg-image">
                <div class="tab-content">
                    @php
                        $imagesGalerie = $product->images()->where('type',TYPE_GALERIE)->get();
                    @endphp

                    @php
                    $mainImage = $product->images()->where('type',TYPE_MAIN)->first();
                    $pathImageMain = isset($mainImage->path) ? asset(UPLOAD_IMAGES_PATH.$mainImage->path) : asset('app-assets/images/default.jpg');
                    @endphp
                    <div class="tab-pane fade show active" id="image-main">
                        <a href="javascript:void(0)" class="long-img">
                            <figure class="zoom" onmousemove="zoom(event)" style="background-image: url('{{$pathImageMain}}')">
                                <img src="{{$pathImageMain}}" class="img-fluid" alt="image">
                            </figure>
                        </a>
                    </div>
                    @foreach ($imagesGalerie as $key => $image)
                        <div class="tab-pane fade" id="image-{{$key}}">
                            @php
                                $pathImage = isset($image->path) ? asset(UPLOAD_IMAGES_PATH.$image->path) : asset('app-assets/images/default.jpg');
                            @endphp
                            <a href="javascript:void(0)" class="long-img">
                                <figure class="zoom" onmousemove="zoom(event)" style="background-image: url('{{$pathImage}}')">
                                    <img src="{{$pathImage}}" class="img-fluid" alt="image">
                                </figure>
                            </a>
                        </div>
                    @endforeach
                </div>
                <ul class="nav nav-tabs pro-page-slider owl-carousel owl-theme">

                    <li class="nav-item items">
                        <a class="nav-link show" data-bs-toggle="tab" href="#image-main"><img src="{{$pathImageMain}}" class="img-fluid" alt="image" /></a>
                    </li>
                    @foreach ($imagesGalerie as $key => $image)
                        @php
                            $pathImage = isset($image->path) ? asset(UPLOAD_IMAGES_PATH.$image->path) : asset('app-assets/images/default.jpg');
                        @endphp
                        <li class="nav-item items">
                            <a class="nav-link" data-bs-toggle="tab" href="#image-{{$key}}"><img src="{{$pathImage}}" class="img-fluid" alt="image"></a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-6 col-xl-6 col-md-6 col-12 col-xs-12 pro-info" id="detail-variant">
                @include('public.products.partials.variants.detail_variant')

            </div>
        </div>
    </form>
</div>

@push('options')
<script>






    $(document).on('click', '.my-option', function(event){
        event.preventDefault();
        // check if clicked active option
        if ($("#this").hasClass("active")) {
            return false;
        }

        // add class active option
        var targetClass = $(this).data('class');
        var targetId = $(this).data('id');
        $('.'+targetClass).removeClass("active");
        $('#'+targetId).val($(this).data('value'));
        $(this).addClass("active");

        // check if each atrribute has option selected
        let $flag=false;
        $('.my-input-option').each(function(){
            if($.trim(this.value).length == 0) {
                console.log('ok 1 ');
                $flag = true;
                return false;
            }
        })
        if($flag){
            return false;
        }
        console.log('ok 2');
        //check if already active





            $.ajax({
                    type: "POST",
                    url: '{{route("detailAjaxProduct")}}',
                    data: $("#detail-form").serialize(),
                    beforeSend: function() {

                    },
                    success: function(data) {
                       $("#detail-variant").html(data);
                    },
                    error: function(reject) {
                        if( reject.status === 422 ) {
                            var errors = $.parseJSON(reject.responseText);
                            $.each(errors.errors, function (key, val) {
                                toastr.error(val[0]);
                            });
                        }else{
                            toastr.error('{{__('messages.ajax_error_global')}}');
                        }
                    },complete: function() {
                    }
                });
        })
</script>

@endpush
