<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }
   
    public function rules()
    {
        return [
            'name' => 'required',
			'description' => 'required'
        ];
    }


    public function messages()
    {
        return [];
    }
}
