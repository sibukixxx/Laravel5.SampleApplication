@extends('layouts.default')
@section('content')

    <div class="container">
        <div class="row">
            <h2 class="signup__title">新規会員登録 </h2>

            <form class="form-group signup" method="post"
                  action="">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <h3 class="">お名前／ログイン情報</h3>
                <table class="table table-bordered table-hover table-striped">
                    <div class="form-group ">
                        <label for="user_id" class="signup__label">ユーザーID</label>
                        <input type="text" class="form-control signup__field" id="user_id" name='user_id' placeholder="メールアドレスを入力してください">
                    </div>
                    <div class="form-group">
                        <label for="password" class="signup__label">パスワード</label>
                        <input type="text" class="form-control signup__field" id="password" name='password' placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="name">名前</label>
                        <input type="text" class="form-control signup__field" id="name" name='name' placeholder="">
                    </div>

                </table>
               <input type="submit" class="btn btn-primary signup__action" value="@if (isset($company->id))更新 @else 作成 @endif">
            </form>
        </div>
    </div>

@stop
@section('styles')
    <link rel="stylesheet" href="/css/signup.css">
@stop