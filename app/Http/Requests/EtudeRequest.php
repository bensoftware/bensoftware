<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //'libelle' => 'required|max:255|unique:famille,libelle,'.$this->id,
            'domaine'  => 'required',
            'niveau_etude'  => 'required',
            'diplôme' => 'required',
            'annee_deb' => 'required',
            'annee_fin'  => 'required',
            'etablissement'  => 'required',
            'ville'  => 'required',
        ];
    }
}
