<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCurriculumRequest extends FormRequest
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
            'code'=> 'unique:App\Models\Curriculum,code|required|numeric|min:1',
            'year'=> 'required|string|min:4|max:4',
        ];
    }

    public function messages()
    {
        return [
            'code.unique' => 'El codigo de plan de estudios ya ha sido registrado',
            'code.required' => 'El codigo del plan de estudios es obligatorio',
            'year.required' => 'El año de postulacion del plan de estudios es obligatorio',
            'active.required' => 'El estatus del plan de estudios es obligatorio',
        ];
    }

}
