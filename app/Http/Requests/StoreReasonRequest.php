<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReasonRequest extends FormRequest
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
            'code'=> 'unique:App\Models\Reason,code|required|numeric|min:1',
            'name'=> 'required|string|min:1',
            'concept'=> 'required|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'El número de motivo es obligatorio',
            'code.unique' => 'El número de motivo ingresado ya ha sido registrado',
            'name.required' => 'El nombre es obligatorio',
            'concept.required' => 'El concepto es obligatorio',
        ];
    }

}
