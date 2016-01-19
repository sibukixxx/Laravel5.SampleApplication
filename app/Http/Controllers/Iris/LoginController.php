<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

//use App\Repositories\UsersLoginRepository;

class LoginController extends Controller
{
//    /**
//     * @param UsersLoginRepositoryInterface $user
//     */
//    public function __construct(UsersLoginRepository $user_id, UsersLoginRepository $user_passwd)
//    {
//        $this->user_id = $user_id;
//        $this->user_passwd = $user_passwd;
//        var_dump($user_id, $user_passwd);
//    }

    // Sample
//    // getでhello/goodmorningにアクセスされた場合
//    public function getGoodmorning()

//    {
//        〜
//    }
//
//    // postでhello/goodmorningにアクセスされた場合
//    public function postGoodmorning()
//    {
//        〜
//    }
//
//    // getでhello/goodmorning/messageでアクセスされた場合
//    public function getGoodmorning($message)
//    {
//        〜
//    }
//
    // getでlogin/にアクセスされた場合
    public function getIndex()
    {
        return view('admin.login.index');
    }

    // getでlogin/にアクセスされた場合
    public function getIndex2()
    {
        return view('admin.login.index2');
    }

    /**
     * Responds to requests to POST /admin/login/check
     */
    public function postCheck()
    {
        $postData = Input::all();

        // 制御文字を禁止するバリデーションのサンプル
//        $validator = Validator::make(
//            ['name' => 'Dayle'],
//            ['name' => 'required|no_ctrl_chars|min:5|max:68']
//        );
        //TODO: ユーザー名チェック && OUTならば注意文言を返す
        $result = $this->check();

        if ($result) {
            $this->success();
        } else {
            $this->fail();
        }
        return view('admin.login.index', $postData);
    }

    private function check()
    {
        //
    }

    private function success()
    {
        //
    }

    private function fail()
    {
        //
    }








    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
