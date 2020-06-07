<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeurRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'libelle' => 'required|unique:employeurs,libelle,'.$this->id,
            'agence_id'  => 'required',
            'secteur_id'  => 'required',
            'agent_id'  => 'required',
        ];
    }
}
