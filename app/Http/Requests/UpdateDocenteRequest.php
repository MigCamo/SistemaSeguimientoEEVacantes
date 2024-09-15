<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDocenteRequest extends FormRequest
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
            //'nPersonal'=> 'unique:App\Models\Docente,nPersonal|nullable|numeric|min:1',
            'nPersonal'=> [
                'nullable',
                'numeric',
                'min:1',
                Rule::unique('docentes')->ignore($this->route('id')),
            ],
            'nombre'=> 'required|string|min:1',
            'apellidoPaterno'=> 'required|string|min:1',
            'apellidoMaterno'=> 'nullable|string|min:1',
            'email'=> 'nullable|email',
        ];
    }

    public function messages()
    {
        return [
            'nPersonal.unique' => 'El número de personal ingresado ya ha sido registrado',
            'nombre.required' => 'El nombre es obligatorio',
            'apellidoPaterno.required' => 'El apellido paterno es obligatorio',
        ];
    }

}
