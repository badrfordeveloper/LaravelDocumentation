<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }
   
    public function rules()
    {
        return [
            'txt' => 'required',
			'txt2' => 'required'
        ];
    }


    public function messages()
    {
        return [];
    }
}
