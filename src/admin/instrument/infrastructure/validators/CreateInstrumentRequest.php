<?php

namespace Src\admin\instrument\infrastructure\validators;

use Illuminate\Foundation\Http\FormRequest;

class CreateInstrumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255|min:3'
        ];
    }
}
