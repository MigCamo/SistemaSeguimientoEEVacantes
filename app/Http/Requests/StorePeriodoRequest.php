<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeriodoRequest extends FormRequest
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
            'nPeriodo'=> 'required|string|min:1',
            'clavePeriodo'=> 'unique:App\Models\Periodo,clavePeriodo|required|string|min:1',
            'descripcion'=> 'required|string|min:1',
        ];

    }

    public function messages()
    {
        return [
            'nPeriodo.required' => 'El número de periodo es obligatorio',
            'clavePeriodo.unique' => 'La clave ingresada ya ha sido registrada',
            'clavePeriodo.required' => 'La clave es obligatoria',
            'descripcion.required' => 'La descripción es obligatoria',
        ];
    }

}
