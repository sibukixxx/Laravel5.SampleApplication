<?php

namespace App\Http\Controllers\Iris;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class SignupController extends Controller
{
    // ログイン画面
    public function getIndex()
    {
        return view('iris.signup.index');
    }

}
