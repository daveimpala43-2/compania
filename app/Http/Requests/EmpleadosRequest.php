<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadosRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'primer_nombre'=> 'required|string',
            'last_name'=> 'required|string',
            'compañia_id'=> 'required|exists:compañias,id',
            'email'=> 'required|',
            'telefono'=> 'required|string',
            'genero'=> 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'primer_nombre.required' => 'Es necesario agregar el Nombre del empleado',
            'last_name.required' => 'Es necesario agregar los apellidos del empleado',
            'email.unique' => 'El email ya esta registrado',
            'telefono.required' => 'Es necesario agregar el telefono del empleado',
            'genero.required' => 'Debes seleccionar un genero',
            'compañia_id.required' => 'Debes de seleccionar una compañia',
            'compañia_id.exists' => 'Debes de seleccionar una compañia valida'
        ];
    }
}
