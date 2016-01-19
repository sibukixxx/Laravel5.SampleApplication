<?php

namespace App\Http\Controllers\Iris;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

//use App\Repositories\UsersLoginRepository;

class LoginController extends Controller
{
    // ログイン画面
    public function getIndex()
    {
        return view('iris.login.index');
    }

}
