<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Traits\DatatablesTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Document extends BaseModel
{
    use SoftDeletes, DatatablesTrait;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
		'short_description',
		'description',
    ];

    const FIELDS_INFOS = [
        'title' => ["name" => "title", "orderable" => "true","searchable" => "true"],
		'short_description' => ["name" => "short_description", "orderable" => "true","searchable" => "true"],
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
