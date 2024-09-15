<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTipoAsignacionRequest extends FormRequest
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
            //'tipo'=> 'required|string|min:1',
            'tipo' => [
                'required',
                'string',
                'min:1',
                Rule::unique('tipo_asignacions')->ignore($this->route('id')),
            ],
            'descripcion'=> 'nullable|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'tipo.required' => 'El tipo de asignaciones obligatorio',
            'tipo.unique' => 'El tipo de asignación ingresado ya ha sido registrado',
        ];
    }
}
