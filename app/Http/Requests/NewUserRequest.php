<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'email'=>'required|unique:users,email',
        ];
    }
    
    public function messages()
    {
        return [
            
            'name.required'=>'Il nome è obbligatorio',
            'email.unique'=>'è già presente un utente con questa mail',
            'email.required'=>'la mail è obbligatoria',
        ];
    }
}
