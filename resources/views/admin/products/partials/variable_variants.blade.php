  <!-- Vertical Wizard -->
  <section class="vertical-wizard">
    <div class="bs-stepper vertical vertical-wizard-example">
        <div class="bs-stepper-header">
            <div class="step" data-target="#attributes-details" role="tab" id="attribute-details-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">1</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">{{__('Attributes')}}</span>
                        <span class="bs-stepper-subtitle">{{ __('Select Attributes aand Options')}}</span>
                    </span>
                </button>
            </div>
            <div class="step" data-target="#options-info" role="tab" id="options-info-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">2</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">{{__('options')}}</span>
                        <span class="bs-stepper-subtitle">{{ __('Personlize the options')}}</span>
                    </span>
                </button>
            </div>
            <div class="step" data-target="#variants-info" role="tab" id="variants-info-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">3</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">{{__('Varitans')}}</span>
                        <span class="bs-stepper-subtitle">{{ __('Personlize the variants')}}</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content">
            <div id="attributes-details" class="content" role="tabpanel" aria-labelledby="attributes-details-trigger">
                <div class="content-header">
                    <h5 class="mb-0">{{__('Attributes')}}</h5>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-1">
                            <select name="attributes[]" required class="select2 form-select" multiple="multiple" id="select-attributes">
                                @foreach ($attributes as $attribute )
                                    @if ( isset($product) && @in_array($attribute->id,$attributesVariations->pluck('id')->toArray()))
                                        <option selected value="{{$attribute->id}}"> {{$attribute->name}}</option>
                                    @else
                                      <option value="{{$attribute->id}}"> {{$attribute->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-secondary btn-prev" disabled>
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">{{__('Previous')}}</span>
                    </button>
                    <button type="button" class="btn btn-primary btn-next" id="showOption" >
                        <span class="align-middle d-sm-inline-block d-none">{{__('Next')}}</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>
            <div id="options-info" class="content" role="tabpanel" aria-labelledby="options-info-trigger">
                <div class="row" id="view-options">
                    @isset($product->id)
                        @include('admin.attributes.partials.options',['attributes' => $attributesVariations])
                    @endisset
                </div>
                <div class="d-flex justify-content-between">
                    <button  type="button" class="btn btn-primary btn-prev">
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button type="button"  class="btn btn-primary btn-next" id="generateVariations">
                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>
            <div id="variants-info" class="content" role="tabpanel" aria-labelledby="variants-info-trigger">
                <div class="content-header">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <select  class="form-select" name="actionAddVariation" id="actionAddVariation">
                                    <option value="">{{__('Select Item')}}</option>
                                    <option value="{{ADD_NEW_VARIATION}}">{{__('Add new variation')}}</option>
                                    <option value="{{GENERATE_VARIATION}}">{{__('Create all variations from all attributes')}}</option>
                                </select>
                                <button type="button" class="btn btn-info add-item-variation"><i data-feather='arrow-right'></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="view-variations-genereted">
                    @isset($product->id)
                        @include('admin.products.partials.variants_products',['attributesVariants'=>$attributesVariations ,'optionsVariants' => $optionsVariants])
                    @endisset
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary btn-prev">
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                    </button>
                    <button class="btn btn-primary btn-next" disabled>
                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>
@if (Request::ajax())
    <!-- /Vertical Wizard -->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>

    @include('partials.global_script')
    @include('admin.products.partials.scriptVariations')

@endif

