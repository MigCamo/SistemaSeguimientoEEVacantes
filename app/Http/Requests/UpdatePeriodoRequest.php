<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePeriodoRequest extends FormRequest
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
            //'clavePeriodo'=> 'required|string|min:1',
            'clavePeriodo' => [
               'required',
               'string',
               'min:1',
               Rule::unique('periodos')->ignore($this->route('id')),
            ],
            'descripcion'=> 'required|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'nPeriodo.required' => 'El número de periodo es obligatorio',
            'clavePeriodo.required' => 'La clave es obligatoria',
            'clavePeriodo.unique' => 'La clave ingresada ya ha sido registrada',
            'descripcion.required' => 'La descripción es obligatoria',
        ];
    }


}
