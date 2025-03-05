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
            'type_asignation' => [
                'required',
                'string',
                'min:1',
                Rule::unique('type_asignations')->ignore($this->route('type_asignation')),
            ],
            'description'=> 'nullable|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'type_asignation.required' => 'El tipo de asignaciones es obligatorio',
            'type_asignation.unique' => 'El tipo de asignación ingresado ya ha sido registrado',
        ];
    }
}
