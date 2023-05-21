<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' =>'required|max:255',
            'apellidos' =>'required|max:255',
            'direccion' =>'required|max:255',
            'ciudad' =>'required|max:255',
            'provincia' =>'required|max:255',
            'codigo_postal' =>'required|max:7',
            'telefono' =>'required|max:20',
            'username'=>'required|unique:users,username',
            'email'=>'required|unique:users,email',
            'fecha_nacimiento' =>'required|max:255',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|same:password',
        ];
    }
}
