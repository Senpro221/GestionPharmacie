<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class medicamentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nom'=>'required',
            'image'=>'required',
            'categorie'=>'required',
            'quantite'=>'required',
            'quantiteMin'=>'required',
            'prix_unitaire'=>'required',
            'dlc'=>'required',
            'libelle'=>'required',
        ];
    }
    public function messages(){
        return [
            'nom.required' => 'Le champ nom est requis',
            'image.required' => 'Le champ image est requis',
            'categorie.required' => 'Le champ categorie est requis',
            'quantite.required' => 'Le champ quantite est requis',
            'quantiteMin.required' => 'Le champ quantiteMin est requis',
            'prix_unitaire.required' => 'Le champ prix_unitaire est requis',
            'dlc' => 'Le champ dlc est requis',
            'libelle.required' => 'Le champ libelle est requis',
        ];
    }
}
