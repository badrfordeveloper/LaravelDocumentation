<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prophecy\Doubler\ClassPatch\HhvmExceptionPatch;
use DataTables;

class BaseModel extends Model{

    protected $actions = null;
    protected $model = null;

    public function getDataTableByModel($model,$data,$actions, $orderBy = "created_at", $querySortOrder ='desc')
    {
        $this->actions = $actions;
        $this->model = $model;
        $dataTable =  Datatables::of($data);
        $request = request();

        $dataTable->addIndexColumn();
        $dataTable = $dataTable->editColumn('action', function($object) use ($model) {
            $viewActions = view('partials.actions',['item' => $object,'slug'=> $model])->render();
            return $viewActions;
        });
        $dataTable = $dataTable->escapeColumns('active')
        ->rawColumns(['action'])
        ->make(true);

        return $dataTable;
    }

}
