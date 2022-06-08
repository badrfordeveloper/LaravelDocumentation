<?php

namespace App\Http\Requests\%parent%;

use Illuminate\Foundation\Http\FormRequest;

class %Model%Request extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }
   
    public function rules()
    {
        return [
            %rules%
        ];
    }


    public function messages()
    {
        return [];
    }
}
