<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreTodoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //Lo cambio a true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //Aquí agrego todas las reglas que se van a validar del formulario
        return [
            'name' => 'required|unique:todos'
        ];
    }

    /**
     * Método para arrojar los mensajes de error de la validacion
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Es ilogico tener un todo sin el todo :S',
            'name.unique'  => 'No pueden existir dos todos iguales',
        ];
    }
}
