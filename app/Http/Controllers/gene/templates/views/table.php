<div class="table-responsive">
    <table class="table">
        <thead class=" text-success">
            <tr>
                %th%
                <th class="text-right">{{ __('labels.actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($%littleModel%s as $item)
            <tr>
                %td%
                <td class=" text-right">

                    @can('%littleModel%-update')
                    <a rel="tooltip" class="btn btn-success btn-link" data-placement="left" data-original-title="{{ __('labels.editer')}}" href="{{ route('%littleModel%s.edit',$item->id)}}">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                    </a>
                    @endcan

                    @can('%littleModel%-delete')
                    <button data-id="{{$item->id}}" data-ref="{{$item->name}}" type="submit" rel="tooltip" class="btn btn-danger btn-link" data-placement="left" data-toggle="modal" data-target="#modalConfirmDelete">
                        <i class="material-icons">delete</i>
                        <div class="ripple-container"></div>
                    </button>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!--pagination-->
    {{ $%littleModel%s->withQueryString()->links() }}

    <p>
        {{ __('labels.Displaying') }} {{$%littleModel%s->count()}} sur {{ $%littleModel%s->total() }} {{ __('labels.%littleModel%s') }}.
    </p>

</div>


<!-- Modal -->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <form action="{{route('%littleModel%s.destroy')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    {{ __('messages.supprimer_question')}}
                </div>
                <div class="modal-footer flex-center">
                    <input type="hidden" name="id" id="id" value="">
                    <a class="btn  btn-outline-danger " data-dismiss="modal">{{ __('labels.non')}}</a>
                    <button type="submit" class="btn btn-delete  btn-danger waves-effect">{{ __('labels.oui')}}</button>
                </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>