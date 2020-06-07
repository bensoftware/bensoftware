<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetenceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'libelle' => 'required|max:255|unique:competences,libelle,'.$this->id,
<<<<<<< HEAD
            'libelle_ar' => 'required|max:255',
            'ref_metier_id' => 'required',
=======
>>>>>>> b0f80c4ff80cac1c41e00ad7245c5bdbf70bd5a5
        ];
    }
}