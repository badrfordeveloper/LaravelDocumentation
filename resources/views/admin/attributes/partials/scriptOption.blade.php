<script>
    var counter = {{ (isset($counter)) ? $counter : 1 }};
    $(document).on('click', '.add-item-option', function() {
        console.log(counter);
        var _item  = rowOpions(counter,$(this).attr('data-type'))
        $('.items').append(_item);
        counter++;
        // load icons
        $(document).ready(function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });
    });
    $(document).on('click', '.remove-item-option', function() {
        if (window.confirm("Voulez vous vraiment supprimer ce élément ? ")) {
            $(this).closest('.item').remove();
        }
    });

    function rowOpions (counter,_type = "text"){
        var _item = '<div class="item col-6"><div class="row d-flex align-items-end"><div class="col-md-8 col-12">';
            if (_type == "color"){
                _item += '<div class="mb-1"><label for="options_'+counter+'_name"  class="form-label">{{ __("labels.value") }} </label><input type="'+_type+'" class="form-control form-control-color" id="options_'+counter+'_name" value="#000000" title="Choose your color" required name="options['+counter+'][ADD]" ></div>';
            } else {
                _item +='<div class="mb-1"><label class="form-label" for="options_'+counter+'_name" >{{ __('labels.value') }} </label><input type="'+_type+'" required class="form-control" name="options['+counter+'][ADD]" id="options_'+counter+'_name" /></div>';
            }
            _item +='</div><div class="col-md-2 col-12 mb-50"><div class="mb-1"><button class="btn btn-outline-danger text-nowrap px-1 remove-item-option" type="button"><i data-feather="x" class="me-25"></i></button></div></div></div><hr /></div>';
        return _item ;
    }
</script>
