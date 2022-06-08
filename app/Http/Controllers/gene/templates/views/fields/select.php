    
    <div class="row">
        <label for="input-roles" class="col-sm-2 col-form-label">{{ucfirst(__('labels.%column%'))}} </label>
        <div class="col-sm-7">
            <select name="%column%" id="%column%" class="custom-select input-group select-with-search form-control pmd-select2 {{ $errors->has('%column%') ? ' danger' : '' }}">
                <option value=''>{{ucfirst(__('labels.%column%'))}}</option>
                @foreach($%itemOfSelect%s as $%itemOfSelect%)
                    @if(isset($%littleModel%->%column%) && $%itemOfSelect%->id == $%littleModel%->%column%)
                        <option selected value="{{$%itemOfSelect%->id}}">{{$%itemOfSelect%->name}}</option>
                    @else
                        <option value="{{$%itemOfSelect%->id}}">{{$%itemOfSelect%->name}}</option>
                    @endif
                @endforeach
            </select>
            @if ($errors->has('%column%'))
            <span class="error text-danger" for="input-roles">{{ $errors->first('%column%') }}</span>
            @endif
        </div>
    </div>