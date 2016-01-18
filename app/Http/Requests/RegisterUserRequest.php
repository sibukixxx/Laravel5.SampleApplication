<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterUserRequest extends Request {

    public function rules()
    {
        return [
//            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required'
        ];
    }

    public function authorize()
    {
        return true;
    }

}