<script>
    $(function () {
    var isRtl = $('html').attr('data-textdirection') === 'rtl';
    var dt_filter_table = $('.dt-column-search');

  // Columns  Search
  // --------------------------------------------------------------------

  if (dt_filter_table.length) {
    // Setup - add a text input to each footer cell
    $('.dt-column-search thead tr').clone(true).appendTo('.dt-column-search thead');
    $('.dt-column-search thead tr:eq(1) th:last').html('');
    $('.dt-column-search thead tr:eq(1) th:not(:last)').each(function (i) {
      var title = $(this).text();
      $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Recherche ' + title + '" />');

      $('input', this).on('keyup change', function () {
        if (dt_filter.column(i).search() !== this.value) {
          dt_filter.column(i).search(this.value).draw();
        }
      });
    });

    var dt_filter = dt_filter_table.DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{$options->url}}",
        columns: [
            @foreach ($options->fields as $key => $field)
            {
                data: "{{$key}}",
            },
            @endforeach
            {data: 'action',name: 'action', orderable: false,searchable: false}
        ],
      dom: '<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
      orderCellsTop: true,
      language: {
        paginate: {
          // remove previous & next text from pagination
          previous: '&nbsp;',
          next: '&nbsp;'
        }
      }
    });
  }


  // on key up from input field
  $('input.dt-input').on('keyup', function () {
    filterColumn($(this).attr('data-column'), $(this).val());
  });

  // Filter form control to default size for all tables
  $('.dataTables_filter .form-control').removeClass('form-control-sm');
  $('.dataTables_length .form-select').removeClass('form-select-sm').removeClass('form-control-sm');

    $(document).on('click', '.delete-item', function(){
        $('#delete_form')[0].action = $(this).attr('data-action');
        $('#delete_modal').modal('show');
    });
});
</script>
