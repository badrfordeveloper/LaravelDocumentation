<div class="row">
    <!-- Invoice repeater -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="divider">
                    <div class="divider-text">{{__('Values List')}}</div>
                </div>
                <div class="items row">
                    @if (!@$attribute)
                        @include('admin.options.partials.item_form',["key" => 0,"type"=>"color"])
                    @else
                        @foreach ($attribute->options as $option )
                            @include('admin.options.partials.item_form',["key" => $option->id,"type"=>"color"])
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-icon btn-primary add-item-option" data-type="color" type="button" >
                            <i data-feather="plus" class="me-25"></i>
                            <span>{{ __('Add New')}}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Invoice repeater -->
</div>
