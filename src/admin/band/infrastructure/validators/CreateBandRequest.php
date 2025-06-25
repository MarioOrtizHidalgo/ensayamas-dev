<?php

namespace Src\admin\band\infrastructure\validators;

use Illuminate\Foundation\Http\FormRequest;

class CreateBandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255|min:5',
            'location' => 'required|max:255|min:5',
            'invite_code' => 'required|max:18|min:4|unique:band,invite_code'
        ];
    }
}
