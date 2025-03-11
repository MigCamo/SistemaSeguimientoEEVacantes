<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLecturerRequest extends FormRequest
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
            'names'=> 'nullable|string|min:1',
            'lastname'=> 'nullable|string|min:1',
            'maternal_surname'=> 'nullable|string|min:1',
            'email'=> 'nullable|email',
        ];
    }

    public function messages()
    {
        return [
          'staff_number.unique' => 'El número de personal ingresado ya ha sido registrado',
          'nombre.required' => 'El nombre es obligatorio',
          'apellidoPaterno.required' => 'El apellido paterno es obligatorio',
        ];
    }



}
