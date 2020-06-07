<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DERequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //'libelle' => 'required|max:255|unique:famille,libelle,'.$this->id,
            'nom' => 'required|max:255|unique:demendeur_emplois,nom,'.$this->id,
        ];
    }
}
