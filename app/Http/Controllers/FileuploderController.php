<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use App\Libraries\MasterData;
use MasterData; // config/app.phpに登録したからこの記法
use Input, Request, File, Redirect;

class FileuploderController extends Controller
{
    private $test;


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        return view('feature_sample.fileuploder.index');
    }


    /**
     * ファイルアップローダー POST
     *
     * @return Response
     */
    // TODO: セッション管理、バリデーションを厳しくする
    // TODO: 例外： ファイル未選択, php.ini定義の最大サイズ超過, フォーム定義の最大サイズ超過,ファイル形式
    // TODO: ファイルデータからSHA-1ハッシュ, ファイルのパーミッション0644
    // TODO: ttp://qiita.com/mpyw/items/939964377766a54d4682
    public function fileUploadtoLocal()
    {
        $ext = ['pdf', 'doc', 'ppt', 'xls', 'docx', 'pptx', 'xlsx', 'rar', 'zip'];

//        $fileupload = array('image' => Input::file('input_file'));
//        $test = $fileupload['image']->getPathname();
//        $test2 = $fileupload['image']->getClientOriginalExtension();
//        $test3 = $fileupload['image']->getClientOriginalName();


        $fileupload = Input::file('input_file');
        $extension = $fileupload->getClientOriginalExtension(); // return PNG
        $name = time().'.'.$extension;; // timestamp

        $destinationPath = 'assets/uploads'; // upload path
        $move = $fileupload->move($destinationPath,$name);

//        $path_name = $fileupload->getPathname(); // return path_name
//        $name = $fileupload->getClientOriginalName(); // return file_name


        if($move){
            return Redirect::to('feature_sample/fileuploder');
        }else{
            return "error";
        }
    }

    /**
     * ファイルアップローダー S3
     *
     * @return Response
     */
    public function fileUploadtoS3()
    {
        $fileupload = Input::all();
        var_dump($fileupload);
        return view('feature_sample.fileuploder.index');
    }

    /**
     * ファイルアップローダー DB
     *
     * @return Response
     */
    public function fileUploadtoDB()
    {
        $fileupload = Input::all();
        var_dump($fileupload);
        return view('feature_sample.fileuploder.index');
    }


    // 他のクラスを呼び出すテスト
    public function s()
    {
        $say = new MasterData();
        return $say->sayHello();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
