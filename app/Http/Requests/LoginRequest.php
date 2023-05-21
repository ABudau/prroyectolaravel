<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;
class LoginRequest extends FormRequest
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
            'username'=> 'required',
            'password'=> 'required',
        ];
    }
    public function getCredentials(){
        $username = $this-> get('username');
        
        if($this->isEmail($username)){//Si el usuario es un correo electronico
            return [//Devuelve un array con el correo electronico y la contraseña
                'email'=>$username,
                'password'=>$this->get('password'
            )];
        }
        //Si el usuario no es un correo electronico(es un nombre de usuario)
        return $this->only('username','password');//Devuelve el nombre de usuario y la contraseña
    }

    public function isEmail($value){
        //Esta funcion comprueba si el campo introducido para la validacion es un email
        $factory = $this->container->make(ValidationFactory::class);

        //Aqui se valida que el campo de usuario sea un correo electrónico
        return !$factory->make(['username'=>$value],['username'=>'email'])->fails();
    }



}
