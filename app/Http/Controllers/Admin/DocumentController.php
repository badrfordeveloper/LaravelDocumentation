<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;

class DocumentController extends Controller
{
    protected $slug = "documents";

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
        $options->url = route(BASE_ADMIN_PATH.'.documents.index');
        $options->fields = Document::FIELDS_INFOS;
        // ----------------------------
        if ($request->ajax()) {
            $documents = Document::query();
            $document =  new Document();
            return $document->getDataTableByModel('documents',$documents,'');
        }
        return view('admin.documents.index',compact('options'));
    }

    public function create()
    {
        return view('admin.documents.create');
    }

    public function store(DocumentRequest $request)
    {
        Document::create($request->all());
        return redirect(BASE_ADMIN_URL.'documents')->with([ 'alert-type' => 'success','message' => __('messages.successfully_created')]);
    }

    public function show(Document $document)
    {
        return view('admin.documents.show', compact('document'));
    }


    public function edit(Document $document)
    {
        return view('admin.documents.edit', compact('document'));
    }


    public function update(Request $request, Document $document)
    {
        $document->update($request->all());
        return redirect(BASE_ADMIN_URL.'documents')->with([ 'alert-type' => 'success','message' => __('messages.successfully_updated')]);
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return redirect(BASE_ADMIN_URL.'documents')->with([ 'alert-type' => 'success','message' => __('messages.successfully_deleted')]);
    }
}




