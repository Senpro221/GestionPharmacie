<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|min:3',
            'prenom'=>'required|min:3',
            'email'=>'required|email|unique:users',
            'telephone'=>'required|min:9',
            'adress'=>'required',
            'role'=>'required',
            'password'=>'required|min: 3'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Le nom est requis',
            'prenom.required' => 'Le prenom est requis',
            'email.required' => 'Le mail est requis',
            'email.unique' => 'Cette adresse mail est déja lié à un compte',
            'telephone.required' => 'Le telephone est requis',
            'adress.required' => 'Le champ adresse est requis',
            'password.required' => 'Le password  est requis',
           
        ];
    }
}
