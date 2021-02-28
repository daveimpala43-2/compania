<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniaRequest extends FormRequest
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
            'nombre' => 'required|string|max:50|min:3',
            'email' => 'required|max:75|unique:compañias',
            'logo' => 'required|image',
            'website' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Es necesario agregar el Nombre de la compañia',
            'email.required' => 'Es necesario agregar el Email de la compañia',
            'email.unique' => 'El email ya esta registrado',
            'logo.required' => 'Debes de seleccionar una imagen',
            'logo.image' => 'El archivo debe de ser una imagen',
            'website.required' => 'Debes de agregar el Sitio web de la empresa'
        ];
    }
}
