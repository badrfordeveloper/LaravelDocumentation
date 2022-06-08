<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;


class Attribute extends BaseModel
{
    use SoftDeletes;
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
