<?php

namespace App\Http\Controllers\Umj;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class LoginController extends Controller
{

    // getでlogin/にアクセスされた場合
    public function getIndex()
    {
        return view('umj.login.index');
    }

}