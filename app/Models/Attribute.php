<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Traits\DatatablesTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Attribute extends BaseModel
{
    use SoftDeletes, DatatablesTrait;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
    ];

    const FIELDS_INFOS = [
        'name' => ["name" => "name", "orderable" => "true","searchable" => "true"],

    ];

    public static function getFormattedFieldValue($field, $value){
        switch ($field){
            case 'created_at':
                return getForrmattedDate($value);
            default:
                return $value;
        }
    }
}
