<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});


##### 認証機能の追加 #####################################################
$router->get('/', function(){
    $currentUser = Auth::user();
    if(empty($currentUser)){
        $name = 'ゲスト';
    }else{
        $name = $currentUser->name;
    }
    return view('top.index')->with('name',$name);;
});

Route::get('auth/logout', function(){
    Auth::logout();
    return redirect(property_exists($this, 'redirectAfterLogout')
        ? $this->redirectAfterLogout : '/admin/login');
});


$router->get('/home', function(){
    $currentUser = Auth::user();
});

/**
 * 共通処理
 *
 *
 */


 /**
  * ユナイテッドマインドジャパン ユーザー管理システム
  * ・応募者情報新規入力
  * ・登録済み情報の編集
  * ・登録済み情報の削除
  * ・登録済み情報の一括出力
  * ・登録済み情報の絞り込み
  * ・求人応募履歴統計算出と出力
  * ・メッセージ機能
  * ・メッセージの履歴
  * ・応募承認
  *
  *
  */

Route::group(['prefix' => 'umj'], function() {
    Route::get('/', 'ElasticsearchController@index');
    Route::post('/', 'ElasticsearchController@create');
    // 追加
    Route::get('search', 'ElasticsearchController@searchOnES');
});


###########################################################################

// Elasticsearch追加
Route::group(['prefix' => 'elasticsearch'], function() {
    Route::get('/', 'ElasticsearchController@index');
    Route::post('/', 'ElasticsearchController@create');
    // 追加
    Route::get('search', 'ElasticsearchController@searchOnES');
});

// ファイルアップロード機能の実装
Route::group(['prefix' => 'feature_sample'], function() {
    Route::get('/fileuploder/', 'FileuploderController@index');
    Route::post('/fileuploder/', 'FileuploderController@create');

    Route::get('/fileuploder/sayHello/', 'FileuploderController@s');
    Route::post('/fileuploder/fileUploadtoLocal/', 'FileuploderController@fileUploadtoLocal');
    Route::post('/fileuploder/fileUploadtoS3/', 'FileuploderController@fileUploadtoS3');
});

// ----- お問い合わせ ----- //
Route::group(['prefix' => 'contact'], function() {
    Route::get('/', 'ContactController@getIndex');
    Route::post('/confirm', 'ContactController@getForm');
    Route::post('/send', 'ContactController@postConfirm');
//    Route::post('/', 'ContactController@create');

});

// ----- 管理画面 ----- //
Route::group(['prefix' => 'admin'], function () {
    // ログイン画面
    Route::controller('login', 'Admin\LoginController');
    Route::get('/login2', 'Admin\LoginController@getIndex2');

    //会社登録画面
    Route::resource('company', 'Admin\CompanyController');

});

// 遊びとか機能を試してみたい場合の色々
// Vue.jsのサンプルページ
Route::get('/welcome', function () {
    return view('welcome');
});

// 1_dev_modern_html_css
Route::get('/top', function () {
    return view('top');
});


// カスタムライブラリの使用例
Route::get('/hoge',function(){

    $hello = new App\Library\MasterData;
    return $hello->sayHello();
});
