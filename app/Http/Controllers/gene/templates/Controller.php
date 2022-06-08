<?php

namespace App\Http\Controllers\Admin\%parent%;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\%parent%\%Model%Request;
use App\Models\%Model%;

class %Model%Controller extends Controller
{
    protected $slug = "%plural%";

    function __construct()
    {
        $this->middleware('permission:'.$this->slug.'.list', ['only' => ['index']]);
        $this->middleware('permission:'.$this->slug.'.show', ['only' => ['show']]);
        $this->middleware('permission:'.$this->slug.'.create', ['only' => ['create','store']]);
        $this->middleware('permission:'.$this->slug.'.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:'.$this->slug.'.delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        // Les options obligatoire pour datatable
        $options = collect();
        $options->url = route(BASE_ADMIN_PATH.'.%plural%.index');
        $options->fields = %Model%::FIELDS_INFOS;
        // ----------------------------
        if ($request->ajax()) {
            $%plural% = %Model%::query();
            $%littleModel% =  new %Model%();
            return $%littleModel%->getDataTableByModel('%plural%',$%plural%,'');
        }
        return view('admin.%plural%.index',compact('options'));
    }

    public function create()
    {
        return view('admin.%parent%.%plural%.create');
    }

    public function store(%Model%Request $request)
    {
        %Model%::create($request->all());
        return redirect(BASE_ADMIN_URL.'%plural%')->with([ 'alert-type' => 'success','message' => __('messages.successfully_created')]);
    }

    public function show(%Model% $%littleModel%)
    {
        return view('admin.%parent%.%plural%.show', compact('%littleModel%'));
    }


    public function edit(%Model% $%littleModel%)
    {
        return view('admin.%parent%.%plural%.edit', compact('%littleModel%'));
    }


    public function update(Request $request, %Model% $%littleModel%)
    {
        $%littleModel%->update($request->all());
        return redirect(BASE_ADMIN_URL.'%plural%')->with([ 'alert-type' => 'success','message' => __('messages.successfully_updated')]);
    }

    public function destroy(%Model% $%littleModel%)
    {
        $%littleModel%->delete();
        return redirect(BASE_ADMIN_URL.'%plural%')->with([ 'alert-type' => 'success','message' => __('messages.successfully_deleted')]);
    }
}




