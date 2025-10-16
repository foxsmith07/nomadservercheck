<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'quantity_stock' => 'required',
            'position' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'il nome è obbligatorio',
            'description.required'=>'la descrizione è obbligatoria',
            'quantity_stock.required'=>'la quantità è obbligatoria',
            'position.required'=>'la posizione è obbligatoria',
        ];
    }
}
