<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLecturerRequest extends FormRequest
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

        $intID = intval('id');
        return [
            'staff_number'=> [
                'nullable',
                'numeric',
                'min:1',
                Rule::unique('lecturers')->ignore($this->route('staff_number'), 'staff_number'),
            ],
            'names'=> 'required|string|min:1',
            'lastname'=> 'required|string|min:1',
            'maternal_surname'=> 'nullable|string|min:1',
            'email'=> 'nullable|email',
        ];
    }

    public function messages()
    {
        return [
            'staff_number.unique' => 'El número de personal ingresado ya ha sido registrado',
            'names.required' => 'El nombre es obligatorio',
            'lastname.required' => 'El apellido paterno es obligatorio',
        ];
    }

}
