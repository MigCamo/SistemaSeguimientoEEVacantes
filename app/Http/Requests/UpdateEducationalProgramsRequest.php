<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEducationalProgramsRequest extends FormRequest
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
            'regionCode' => 'required|string|min:1',
            'departamentCode' => 'required|string|min:1',
            'program_code' => 'required|string|min:1',
            'name' => 'required|string|min:1',
            'initialhours' => 'required|numeric|min:1',
            'usedhours' => 'nullable|numeric|min:1',
        ];
    }


    public function messages()
    {
        return [
            'regionCode.required' => 'La zona es obligatoria',
            'departamentCode.required' => 'La dependencia es obligatoria',
            'program_code.required' => 'La clave del programa educativo es obligatorio',
            'name.required' => 'El nombre del programa educativo es obligatorio',
            'usedhours.required' => 'Las horas iniciales es obligatorio',
        ];
    }
}

