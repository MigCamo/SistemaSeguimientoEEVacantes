<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEducationalExperienceRequest extends FormRequest
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
            //'numMateria'=> 'unique:App\Models\ExperienciaEducativa,numMateria|required|numeric|min:1',
            'code' => [
              'required',
              'string',
              'min:1',
              Rule::unique('experiencia_educativas')->ignore($this->route('id')),
            ],
        ];
    }

    public function messages()
    {
        return [
          'code.required' => 'El número de la Experiencia Educativa es obligatorio',
          'code.unique' => 'El número de materia ingresado ya ha sido registrado',
          'name.required' => 'El nombre es obligatorio',
          'hours.required' => 'El número de horas es obligatorio',
        ];
    }

}
