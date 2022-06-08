<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }
   
    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }


    public function messages()
    {
        return [];
    }
}
