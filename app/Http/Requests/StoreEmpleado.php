<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleado extends FormRequest
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
            'codigo'         => 'required|string|max:255|unique:empleados,codigo',
            'nombre'         => 'required|string|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'salarioDolares' => 'required|numeric|min:0|max:99999999.99',
            'direccion'      => 'required|string|max:255',
            'estado'         => 'required|string|max:255',
            'ciudad'         => 'required|string|max:255',
            'telefono'       => 'required|string|max:255|phone:MX',
            'correo'         => 'required|string|max:255|email|unique:empleados,correo',
            'activo'         => 'required|string|max:255',
        ];
    }
}
