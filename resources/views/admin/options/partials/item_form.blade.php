@php
    $action = isset($option->id) ? ACTION_EDIT : ACTION_CREATE;
    $type = isset($type) ? $type : "text";
@endphp
<div class="item col-6">
    <div class="row d-flex align-items-end">
        <div class="col-md-8 col-12">
            @if ($type == "color")
                <div class="mb-1">
                    <label for="options_{{$option->id ?? $key}}_name"  class="form-label">{{ __('labels.value') }} </label>
                    <input type="color" class="form-control form-control-color" id="options_{{$option->id ?? $key}}_name" value="{{$option->name ?? '#000000'}}" title="Choose your color" required name="options[{{$option->id ?? $key}}][{{$action}}]" >
                </div>
            @else
                <div class="mb-1">
                    <label class="form-label" for="options_{{$option->id ?? $key}}_name" >{{ __('labels.value') }} </label>
                    <input type="{{$type}}" value="{{$option->name ?? ''}}" required class="form-control" name="options[{{$option->id ?? $key}}][{{$action}}]" id="options_{{$option->id ?? $key}}_name" />
                </div>
            @endif
        </div>
        <div class="col-md-2 col-12 mb-50">
            <div class="mb-1">
                <button class="btn btn-outline-danger text-nowrap px-1 remove-item-option" type="button">
                    <i data-feather="x" class="me-25"></i>
                </button>
            </div>
        </div>
    </div>
    <hr />
</div>
@if (Request::ajax() )
<script>
    // load icons
    $(document).ready(function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    });
</script>
@endif
