<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;


class Test extends BaseModel
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'txt',
		'txt2',
    ];

    const FIELDS_INFOS = [
        'txt' => ["name" => "txt", "orderable" => "true","searchable" => "true"],
		'txt2' => ["name" => "txt2", "orderable" => "true","searchable" => "true"],
		
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
