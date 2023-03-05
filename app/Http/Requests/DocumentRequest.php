<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }
   
    public function rules()
    {
        return [
            'title' => 'required',
			'short_description' => 'required',
			'description' => 'required'
        ];
    }


    public function messages()
    {
        return [];
    }
}
