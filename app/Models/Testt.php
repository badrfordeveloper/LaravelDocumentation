<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;


class Testt extends BaseModel
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'ff',
		'bb',
    ];

    const FIELDS_INFOS = [
        'ff' => ["name" => "ff", "orderable" => "true","searchable" => "true"],
		'bb' => ["name" => "bb", "orderable" => "true","searchable" => "true"],
		
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
