<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'libelle' => 'required|unique:formations,libelle,'.$this->id,
            'centre_formation_id'  => 'required',
            'ref_types_formation_id'  => 'required',
            'ref_langue_id'  => 'required',
            'domaine_id'  => 'required',
            'date_debut' => 'date',
            'date_fin' => 'date|after_or_equal:date_debut',
        ];
    }
}
