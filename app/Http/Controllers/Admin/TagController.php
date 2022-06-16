<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    protected $slug = "tags";

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
        $options->url = route(BASE_ADMIN_PATH.'.tags.index');
        $options->fields = Tag::FIELDS_INFOS;
        // ----------------------------
        if ($request->ajax()) {
            $tags = Tag::query();
            $tag =  new Tag();
            return $tag->getDataTableByModel('tags',$tags,'');
        }
        return view('admin.tags.index',compact('options'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->all());
        return redirect(BASE_ADMIN_URL.'tags')->with([ 'alert-type' => 'success','message' => __('messages.successfully_created')]);
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }


    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }


    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        return redirect(BASE_ADMIN_URL.'tags')->with([ 'alert-type' => 'success','message' => __('messages.successfully_updated')]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect(BASE_ADMIN_URL.'tags')->with([ 'alert-type' => 'success','message' => __('messages.successfully_deleted')]);
    }
}




