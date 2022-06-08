<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;

class AttributeController extends Controller
{
    protected $slug = "attributes";

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
        $options->url = route(BASE_ADMIN_PATH.'.attributes.index');
        $options->fields = Attribute::FIELDS_INFOS;
        // ----------------------------
        if ($request->ajax()) {
            $attributes = Attribute::query();
            $attribute =  new Attribute();
            return $attribute->getDataTableByModel('attributes',$attributes,'');
        }
        return view('admin.attributes.index',compact('options'));
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(AttributeRequest $request)
    {
        Attribute::create($request->all());
        return redirect(BASE_ADMIN_URL.'attributes')->with([ 'alert-type' => 'success','message' => __('messages.successfully_created')]);
    }

    public function show(Attribute $attribute)
    {
        return view('admin.attributes.show', compact('attribute'));
    }


    public function edit(Attribute $attribute)
    {
        return view('admin.attributes.edit', compact('attribute'));
    }


    public function update(Request $request, Attribute $attribute)
    {
        $attribute->update($request->all());
        return redirect(BASE_ADMIN_URL.'attributes')->with([ 'alert-type' => 'success','message' => __('messages.successfully_updated')]);
    }

    public function destroy(Attribute $attribute)
    {
        $attribute->delete();
        return redirect(BASE_ADMIN_URL.'attributes')->with([ 'alert-type' => 'success','message' => __('messages.successfully_deleted')]);
    }
}




