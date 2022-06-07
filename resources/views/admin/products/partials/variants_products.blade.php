@foreach ($optionsVariants as $key => $optionsVariant )
    <!-- Collapsible and Refresh Actions -->
    <div class="card item-variation">
        <div class="card-header ">
            <h5 class="card-title "> Variant # @if(isset($optionsVariant['variant']->active)) {{$key}} @else {{$key}} @endif -
                @foreach ($attributesVariants as  $attributeVariant)
                <span class="d-inline d-inline-block">
                    <select required class="form-select" name="variants[{{$key}}][options][]">
                        <option value="" > {{$attributeVariant->name}}</option>
                       @foreach ($attributeVariant->options as $optionItem )
                           <option value="{{$optionItem->id}}" {{ (in_array($optionItem->id, $optionsVariant['options'])) ? 'selected' : '' }} > {{$optionItem->name}}</option>
                       @endforeach
                   </select>
               </span>
                @endforeach

            </h5>
            @if(!isset($optionsVariant['variant']))
            <input type="hidden" name="variants[{{$key}}][action]" value="{{ACTION_CREATE}}">
            @endif

            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li>
                        <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                <div class="row">
                    <div class="mb-1 col-md-2">
                        <label class="form-label">{{ __('labels.active')}} *</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" @if(isset($optionsVariant['variant']->active)) {{ ($optionsVariant['variant']->active == 1) ? 'checked' : '' }} @else  checked @endif  name="variants[{{$key}}][active]" class="form-check-input" id="active-{{$key}}" />
                            <label class="form-check-label" for="active-{{$key}}"></label>
                        </div>
                    </div>
                    <div class="mb-1 col-md-3">
                        <label class="form-label" for="quantity-{{$key}}">{{__('labels.quantity')}}</label>
                        <input type="number" value="{{@$optionsVariant['variant']->quantity ?? ''}}" id="quantity-{{$key}}" name="variants[{{$key}}][quantity]" class="form-control" placeholder="{{__('labels.quantity')}}" />
                    </div>
                    <div class="mb-1 col-md-3">
                        <label class="form-label" for="price-{{$key}}">{{__('labels.price')}}</label>
                        <input type="text" value="{{@$optionsVariant['variant']->price ?? ''}}" id="price-{{$key}}"  name="variants[{{$key}}][price]" class="form-control" placeholder="{{__('labels.price')}}" />
                    </div>
                    <div class="mb-1 col-md-2">
                        <label class="form-label">{{ __('labels.isDefault')}} *</label>
                        <div class="form-check form-switch">
                            <input type="checkbox" {{ (@$optionsVariant['variant']->is_default == 1) ? 'checked' : '' }} name="variants[{{$key}}][isDefault]" class="form-check-input" id="isDefault-{{$key}}" />
                            <label class="form-check-label" for="isDefault-{{$key}}"></label>
                        </div>
                    </div>
                    <div class="mb-1 col-md-2">
                        <button type="button" class="btn btn-danger remove-item-variation"><i data-feather='trash-2'></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Collapsible and Refresh Actions -->
@endforeach
@if (Request::ajax())
    @include('partials.global_script')
@endif


