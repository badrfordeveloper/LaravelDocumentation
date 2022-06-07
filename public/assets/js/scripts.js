(function (window, undefined) {
  'use strict';

  /*
  NOTE:
  ------
  PLACE HERE YOUR OWN JAVASCRIPT CODE IF NEEDED
  WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR JAVASCRIPT CODE PLEASE CONSIDER WRITING YOUR SCRIPT HERE.  */


    /**
     * Open modals with ajax content
     */
     $(document).on("click",'.ajax-modal',function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var _this = $(this);
        $.ajax({
            url: url,
            beforeSend: function (xhr) {
            }
        })
        .done(function (data) {
            $('#view_modal #url-modal').attr('href',url);
            $('#view_modal .modal-content .data-model').html(data);
            $('#view_modal').modal('show');

        });
    });



})(window);
