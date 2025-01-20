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
     * @return array
     */
     public function rules()
    {
        return [
            'last_name' => 'required|string|between:3,255',
            'first_name' => 'required|string|between:3,255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    }
    
    public function messages(){
        return[
                'last_name.required' => "Ce champ est obligatoire",
                'last_name.between' => "Le nom doit faire entre 3 et 255 caractères",
                'first_name.required' => "Ce champ est obligatoire",
                'first_name.between' => "Le prenom doit faire entre 3 et 255 caractères",
                'email.required' => "Ce champ est obligatoire",
                'email.unique' => "Cette adresse email exist déjà!",
                'password.required' => "Ce champ est obligatoire",
                'password.min' => "Pour des raisons de sécurité, votre mot de passe doit faire minimum 8 caractères.",
                'password_confirmation.same' => "La confirmation du mot de passe et le mot de passe doivent correspondre",
            ];
    }
}
