<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMotivoRequest extends FormRequest
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
            //
            //'numeroMotivo'=> 'required|numeric|min:1',
            'numeroMotivo' => [
              'required',
              'numeric',
              'min:1',
              Rule::unique('motivos')->ignore($this->route('id')),
            ],
            'nombre'=> 'required|string|min:1',
            'concepto'=> 'required|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'numeroMotivo.required' => 'El número de motivo es obligatorio',
            'numeroMotivo.unique' => 'El número de motivo ingresado ya ha sido registrado',
            'nombre.required' => 'El nombre es obligatorio',
            'concepto.required' => 'El concepto es obligatorio',
        ];
    }

}
