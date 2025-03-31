<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CovRequest extends FormRequest
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
            'datetime'=>'required',
            'train_id'=>'required',
            'worker'=>'required',
            'request'=>'required',
            'resolved'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'datetime.required'=>'La data e l\'ora sono richiesti',
            'train_id.required'=>'Il treno è obbligatorio',
            'worker.required'=>'Aggiungi il lavoratore',
            'request.required'=>'Aggiungi la richiesta',
            'resolved.required'=>'Aggiungi uno stato',
        ];
    }
}
