<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;


class %Model% extends BaseModel
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        %columnsModel%,
    ];

    const FIELDS_INFOS = [
        %fieldsInfos%
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
