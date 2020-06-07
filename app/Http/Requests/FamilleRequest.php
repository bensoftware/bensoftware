<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'libelle' => 'required|max:255|unique:familles,libelle,'.$this->id,
        ];
    }
}
