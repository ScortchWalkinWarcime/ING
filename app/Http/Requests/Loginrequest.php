<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;
class LogInrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            name => 'required',
            password => 'required'
        ];
    }

    public function getcredentials()
    {
        $name = $this->get('name');


        if($this->isEmail($username)){
            return[   
                'email' => $username,
                'password' => $this->get('password'), 
            ];}
            return $this->only('name', 'password');
        }

    public function isEmail($value){
        $factory = $this->container->make(ValidationFactory::class);
        return $factory->make(['username' => $value], ['username' => 'email']);
    }
}