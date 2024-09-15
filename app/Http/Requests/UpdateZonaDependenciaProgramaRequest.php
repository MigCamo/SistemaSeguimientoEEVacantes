<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateZonaDependenciaProgramaRequest extends FormRequest
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
            'idZona' => 'required|numeric|min:1',
            'nombreZona' => 'required|string|min:1',
            'claveDependencia' => 'required|numeric|min:1',
            'nombreDependencia' => 'required|string|min:1',
            'clavePrograma' => 'required|numeric|min:1',
            'nombrePrograma' => 'required|string|min:1',
            'horasIniciales' => 'required|numeric|min:1',
            'horasUtilizadas' => 'nullable|numeric|min:1',
            'horasDisponibles' => 'nullable|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'idZona.required' => 'El id de la zona es obligatorio',
            'nombreZona.required' => 'El nombre de la zona es obligatorio',
            'claveDependencia.required' => 'La clave de la dependencia es obligatorio',
            'nombreDependencia.required' => 'El nombre de la dependencia es obligatorio',
            'clavePrograma.required' => 'La clave del programa educativo es obligatorio',
            'nombrePrograma.required' => 'El nombre del programa educativo es obligatorio',
            'horasIniciales.required' => 'Las horas iniciales es obligatorio',
            //'.required' => 'El  es obligatorio',
        ];
    }

}
