<?php

namespace App\Http\Requests;

use App\Models\EducationalExperience;
use Illuminate\Foundation\Http\FormRequest;

class StoreExperienciaEducativaRequest extends FormRequest
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
    //https://laravel.com/docs/9.x/validation#form-request-validation
    public function rules()
    {
        return [
            'code'=> 'unique:App\Models\EducationalExperience,code|required|string|min:1',
            'name'=> 'required|string|min:1',
            'hours'=> 'required|string|min:1',
        ];
    }

    public function messages()
    {
        return [
          'code.required' => 'El código de la Experiencia Educativa es obligatorio',
          'code.unique' => 'El código de materia ingresado ya ha sido registrado',
          //'nrc.unique' => 'El NRC ingresado ya ha sido registrado',
          'name.required' => 'El nombre es obligatorio',
          'hours.required' => 'El número de horas es obligatorio',
          'hours.numeric' => 'El número de horas debe de ser un valor numérico'
        ];
    }



}
