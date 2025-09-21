<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItaloupgradeRequest extends FormRequest
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
            'train_id' => 'required',
            'start' => 'required',
            'end' => 'required',
            'location' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'train_id' => 'devi selezionare un treno',
            'start' => 'immetti la data di inizio',
            'end' => 'immetti la data di fine',
            'location' => 'immetti il luogo del commissioning',
        ];
    }
}
