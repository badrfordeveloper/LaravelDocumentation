<!-- BEGIN : Modal Popup-->
{{-- <div class="modal" id="view_modal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> --}}
<div class="modal" id="view_modal" role="dialog">
    <a style="display: none" id="url-modal" href="" class="ajax-modal"></a>
    <div class="modal-dialog modal-@if(isset($modalSize)){{$modalSize}} @else{{'lg'}} @endif  modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="data-model">
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END : MOdal Popup-->
