<div class="">
    <table class="table">
      <thead>
        <tr>
          <th>{{__('labels.attributes')}}</th>
          <th>{{__('labels.options')}}</th>
        </tr>
      </thead>
      <tbody>
          @foreach ( $attributes as $attribute )
          <tr>
            <td>
                {{$attribute->getLabel()}}
            </td>
            <td>
                <select required name="options[{{$attribute->id}}][]" class="select2 form-select selected-options" multiple="multiple">
                    @foreach ($attribute->options as $option )
                        @if ( isset($optionsSelected) && @in_array($option->id,$optionsSelected->pluck('id')->toArray()) )
                            <option selected value="{{$option->id}}">{{$option->getLabel()}}</option>
                        @else
                            <option value="{{$option->id}}">{{$option->getLabel()}}</option>
                        @endif
                    @endforeach
                </select>
            </td>
          </tr>
          @endforeach

      </tbody>
    </table>
  </div>
  @if (Request::ajax())
  <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
  <script src="{{ asset('app-assets/js/scripts/forms/form-select2.js')}}"></script>
  @endif
