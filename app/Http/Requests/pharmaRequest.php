<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class pharmaRequest extends FormRequest
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
            'name'=>'required',
            'prenom'=>'required',
            'email'=>'required',
            'statut'=>'required',
            'password'=>'required',
            'nom'=>'required',
            'adresse'=>'required',
            'ville'=>'required',
            'quartier'=>'required',
            'telephone'=>'required',
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Le champ nom est requis',
            'prenom.required' => 'Le champ prenom est requis',
            'email.required' => 'Le champ email est requis',
            'statut.required' => 'Le champ statut est requis',
            'password.required' => 'Le champ password est requis',
            'nom.required' => 'Le champ nom est requis',
            'ville.required' => 'Le champ ville est requis',
            'telephone.required' => 'Le champ telephone est requis',
            'adresse.required' => 'Le champ adresse est requis',
            'quartier.required' => 'Le champ quartier est requis',
        ];
    }
}
