<?php

namespace App\Models\Traits;
use DataTables;

Trait DatatablesTrait {

    protected $actions = null;
    protected $model = null;

    public function getDataTableByModel($model,$data,$actions, $orderBy = "created_at", $querySortOrder ='desc')
    {
        $this->actions = $actions;
        $this->model = $model;
        $dataTable =  Datatables::of($data->orderBy($orderBy,$querySortOrder));
        $request = request();

        $dataTable->addIndexColumn();
        $dataTable = $dataTable->editColumn('parent_id', function($object) use ($model) {
            return $object->render('parent_id');
        });
        $dataTable = $dataTable->editColumn('active', function($object) use ($model) {
            return $object->render('active');
        });
        $dataTable = $dataTable->editColumn('status', function($object) use ($model) {
            return $object->render('status');
        });
        $dataTable = $dataTable->editColumn('isNew', function($object) use ($model) {
            return $object->render('isNew');
        });
        $dataTable = $dataTable->editColumn('is_guest', function($object) use ($model) {
            return $object->render('is_guest',);
        });
        $dataTable = $dataTable->editColumn('isFeatured', function($object) use ($model) {
            return $object->render('isFeatured');
        });
        $dataTable = $dataTable->editColumn('type', function($object) use ($model) {
            return $object->render('type');
        });
        $dataTable = $dataTable->editColumn('action', function($object) use ($model) {
            // vérifier si le Model et composé par 2 parties 'exemple_exemple'
            $ModelParts = explode("_",$model);
            $slug = $model;
            if(@count($ModelParts) > 1){
                $slug = implode("-",$ModelParts);
            }

            $viewActions = $this->getActionView($model);

            return view($viewActions,['item' => $object,'slug'=> $slug])->render();
        });
        $dataTable = $dataTable->editColumn('shipping_method_id', function($object) use ($model) {
            return $object->render('shipping_method_id');
        });
        $dataTable = $dataTable->editColumn('customer_id', function($object) use ($model) {
            return $object->render('customer_id');
        });
        $dataTable = $dataTable->editColumn('payment_method_id', function($object) use ($model) {
            return $object->render('payment_method_id');
        });
        $dataTable = $dataTable->editColumn('delivered_customer_id', function($object) use ($model) {
            return $object->render('delivered_customer_id');
        });
        $dataTable = $dataTable->editColumn('city_id', function($object) use ($model) {
            return $object->render('city_id');
        });
        $dataTable = $dataTable->editColumn('zone_id', function($object) use ($model) {
            return $object->render('zone_id', $object->zone,$object);
        });
        $dataTable = $dataTable->editColumn('rate', function($object) use ($model) {
            return $object->render('rate', $object->rate,$object);
        });
        $dataTable = $dataTable->editColumn('created_at', function($object) use ($model) {
            return $object->render('created_at');
        });
        $dataTable = $dataTable->escapeColumns('active')
        ->rawColumns(['action'])
        ->make(true);

        return $dataTable;
    }

    public function getActionView($model){
        $result = "";
        switch ($model) {
            case 'documents':
                $result = 'partials.actions_documents';
                break;

            default:
                $result = 'partials.actions';
                break;
        }

        return $result;
    }

}
