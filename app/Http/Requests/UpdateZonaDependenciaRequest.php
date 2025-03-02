<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateZonaDependenciaRequest extends FormRequest
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
            'id_zona' => 'required|string|min:1',
            'claveDependencia' => [
                Rule::unique('regions_departaments','departament_code')->ignore($this->route('id')),
            ],
            'nombreDependencia' => 'required|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'id_zona.required' => 'La zona es obligatoria',
            'claveDependencia.unique' => 'La clave de la dependencia ya existe',
            'nombreDependencia.required' => 'El nombre de la dependencia es obligatorio',
        ];
    }
}
