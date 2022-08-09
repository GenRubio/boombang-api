<?php

namespace App\Http\Controllers\Api\v1\Auth\Requests\AuthController;

use Illuminate\Foundation\Http\FormRequest;

class AuthControllerLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
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
            'data.name' => 'required',
            'data.password' => 'required'
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'data.name.required' => 'Nombre de usuario es requerido',
            'data.password.required' => 'Contraseña es requerida'
        ];
    }
}
