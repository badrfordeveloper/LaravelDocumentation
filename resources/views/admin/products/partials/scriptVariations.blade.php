<script src="{{ asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>

<!-- Script Wizard Vertical -->
<script>
$(document).ready(function () {

    var verticalWizard = document.querySelector('.vertical-wizard-example');
     // Vertical Wizard
  // --------------------------------------------------------------------
  if (typeof verticalWizard !== undefined && verticalWizard !== null) {
    var verticalStepper = new Stepper(verticalWizard, {
      linear: false
    });
    @if (@$action == ACTION_EDIT)
    verticalStepper.to(3);
    @endif
    // afficher les attributes avec ses options
    $(verticalWizard)
      .find('#showOption')
      .on('click', function () {
        // filter les inputs de form
        var filters = {
            "_method": true
        };
        var attributes =$('#select-attributes').val();
        var data =  $('form.add-edit-product').find(":input").filter(function (i, item) { return !filters[item.name];}).serialize()
        if(attributes.length > 0 ){
            $.ajax({
                type: "POST",
                url: "{{ route(BASE_ADMIN_PATH.'.attributes.getOptionByAttribute') }}",
                data: data,
                success: function (response) {
                    $('#view-options').html(response);
                }
            });
            verticalStepper.next();
        }else{
            alert('champs required')
        }
      });
      // générer les variations à partir des options seletionnez
    $(verticalWizard)
      .find('#generateVariations')
      .on('click', function () {
        // filter les inputs de form
        var filters = {
            "_method": true
        };
        var optionsSelected =$('.selected-options').val();
        if( optionsSelected != "" ){
            var _url = "{{ route(BASE_ADMIN_PATH.'.products.generateVariantesProduct') }}";
            @if (@$action == ACTION_EDIT)
                _url+='?product={{$product->slug}}';
            @endif
            $.ajax({
                type: "POST",
                url: _url,
                data:  $('form.add-edit-product').find(":input").filter(function (i, item) { return !filters[item.name];}).serialize(),
                success: function (response) {
                    $('#view-variations-genereted').html(response);
                }
            });
            verticalStepper.next();
        }else{
            alert('champs required')
        }
      });
      // Ajouter nv variation après la génération des variations
    $(verticalWizard)
      .find('.add-item-variation')
      .on('click', function () {
        // filter les inputs de form
        var filters = {
            "_method": true
        };

        var _actionAddVariation =$('#actionAddVariation').val();
        if( _actionAddVariation != "" ){
            var _url = "{{ route(BASE_ADMIN_PATH.'.products.generateVariantesProduct') }}";
            @if (@$action == ACTION_EDIT)
                _url+='?product={{$product->slug}}';
            @endif

            $.ajax({
                type: "POST",
                url: _url,
                data:  $('form.add-edit-product').find(":input").filter(function (i, item) { return !filters[item.name];}).serialize(),
                success: function (response) {
                    if (_actionAddVariation == '{{ADD_NEW_VARIATION}}') {
                        console.log($('#view-variations-genereted').find('.item-variation').last());
                        $('#view-variations-genereted').find('.item-variation').last().after(response);
                    } else {
                        $('#view-variations-genereted').html(response);
                    }
                    $('#actionAddVariation').val("");
                }
            });
            verticalStepper.next();
        }else{
            alert('champs required')
        }
      });

    $(verticalWizard)
      .find('.btn-prev')
      .on('click', function () {
        verticalStepper.previous();
      });

    $(verticalWizard)
      .find('.btn-submit')
      .on('click', function () {
        alert('Submitted..!!');
      });
  }

});
</script>
<script>
    $(document).on('click', '.remove-item-variation', function() {
       if (window.confirm("Voulez vous vraiment supprimer ce élément ? ")) {
           $(this).closest('.item-variation').remove();
       }
   });
</script>
