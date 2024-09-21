<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolPeriodRequest extends FormRequest
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
            'period_number'=> 'required|string|min:1',
            'code'=> 'unique:App\Models\SchoolPeriod,code|required|string|min:1',
            'description'=> 'required|string|min:1',
        ];

    }

    public function messages()
    {
        return [
            'period_number.required' => 'El número de periodo es obligatorio',
            'code.unique' => 'La clave ingresada ya ha sido registrada',
            'code.required' => 'La clave es obligatoria',
            'description.required' => 'La descripción es obligatoria',
        ];
    }

}
