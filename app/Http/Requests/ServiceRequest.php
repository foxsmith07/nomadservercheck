<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'event'=>'required',
            'train'=>'required',
            'impact'=>'required',
            'start_expected'=>'required',
            'start_actual'=>'required',
            'end_expected'=>'required',
        ];
    }
    
    public function messages()
    {
        return [
            
            'event.required'=>'Aggiungi l\'evento',
            'train.required'=>'Aggiungi il treno',
            'impact.required'=>'Aggiungi User impact',
            'start_expected.required'=>'Aggiungi la data e l\'ora di Start Expected',
            'start_actual.required'=>'Aggiungi la data e l\'ora di Start Actual',
            'end_expected.required'=>'Aggiungi la data e l\'ora di End Expected',
        ];
    }
}
