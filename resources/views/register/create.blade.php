@extends('layouts.default')
@section('content')
    <div class="row">
        <h1>新規会員登録</h1>

        <form action="register" method="post">
            <div class="form-group">

                <div class="control-group">
                    <div class="control-label">
                        <label>ログインID<i class="label label-important">必須</i></label>
                    </div>
                    <div class="controls">
                        <input name="name" value="" type="text" id="name">

                        <p class="help-block">* メールアドレスを入力してください</p>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <label>パスワード <i class="label label-important">必須</i></label>
                    </div>
                    <div class="controls">
                        <input name="password" value="" type="password" id="form_password">
                           <p class="help-block">* 6文字以上の半角英数字</p>
                       </div>
                   </div>
               </div>
               <input type="submit" class="btn btn-primary" id="register" value="新規会員登録"/>
               <input type="hidden" name="_token" value="{{csrf_token()}}">

        </form>
    </div>

@stop
{{--@section('styles')--}}
{{--@stop--}}