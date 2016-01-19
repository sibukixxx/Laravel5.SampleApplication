<?php namespace

App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Input;

abstract class Controller extends BaseController
{
    use DispatchesCommands, ValidatesRequests;

    // Formデータや認証の共通化
    public function __construct()
    {
//        $this->middleware('auth');
//        $this->me = \Auth::user();
//        $this->requestData = Input::all();
    }

}
