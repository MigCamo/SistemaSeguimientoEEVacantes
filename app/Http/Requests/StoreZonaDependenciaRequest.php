<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreZonaDependenciaRequest extends FormRequest
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
        return []; // Devuelve un array vacío para desactivar la validación
    }

    public function messages()
    {
        return [
            'id_zona.required' => 'La zona es obligatoria',
            'claveDependencia.unique' => 'La clave de la dependencia ya ha sido registrada',
            'nombreDependencia.required' => 'El nombre de la dependencia es obligatorio',
        ];
    }
}