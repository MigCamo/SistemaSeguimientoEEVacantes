<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSchoolPeriodRequest extends FormRequest
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
            'period_number' => 'required|string|min:1',
            'code' => [
                'required',
                'string',
                'min:1',
                Rule::unique('school_periods')->ignore($this->route('code'), 'code'),
            ],
            'description' => 'required|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'period_number.required' => 'El número de periodo es obligatorio',
            'code.required' => 'La clave es obligatoria',
            'code.unique' => 'La clave ingresada ya ha sido registrada',
            'description.required' => 'La descripción es obligatoria',
        ];
    }


}
