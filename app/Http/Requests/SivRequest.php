<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SivRequest extends FormRequest
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
            'train_id'=>'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'train_id'=>'devi selezionare un treno',
            'description'=>'La descrizione è richiesta',
        ];
    }
}
