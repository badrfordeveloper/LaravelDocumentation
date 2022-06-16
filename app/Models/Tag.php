<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Traits\DatatablesTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tag extends BaseModel
{
    use SoftDeletes, DatatablesTrait;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
		'description',
    ];

    const FIELDS_INFOS = [
        'name' => ["name" => "name", "orderable" => "true","searchable" => "true"],
		'description' => ["name" => "description", "orderable" => "true","searchable" => "true"],

    ];

    public function render($field){
        $value = $this->{$field};
        switch ($field){
            case 'created_at':
                return getForrmattedDate($value);
            default:
                return $value;
        }
    }
}
