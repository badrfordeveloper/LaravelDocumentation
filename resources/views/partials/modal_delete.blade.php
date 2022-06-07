{{-- Single delete modal --}}
<div class="modal modal-danger" tabindex="-1" id="delete_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="voyager-trash"></i>Êtes-vous sûr de vouloir supprimer?
                </h4>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close"><em class="icon ni ni-cross"></em></a>
            </div>
            <div class="modal-footer">
                <form action="#" id="delete_form" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('Yes') }} {{__('Delete') }}">
                </form>
                <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">{{ __('Cancel') }}</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
