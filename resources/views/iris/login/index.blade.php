@extends('layouts.loginDefault')
@section('content')

    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                        <div class="login-panel panel panel-default">
                            <div class="panel-heading">
                                <h2 class="panel-title text-center"> 広告求人ユーザー側ログイン画面</h2>
                            </div>

                            <div class="panel-body">
                                <form role="form" method="POST" action="{{ url('/auth/login') }}">
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" id="email" name="email" class="form-control"
                                                   placeholder="メールアドレス" required="required" autofocus="">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="password" name="password"
                                                   class="form-control"
                                                   placeholder="パスワード" required="required">
                                        </div>
                                        <input class="btn btn-lg btn-primary btn-block" type="submit" id="_submit"
                                               name="_submit" value="ログイン">

                                    </fieldset>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                </form>
                            </div>


                            <div class="panel-footer">
                                <a href="/"><i class="glyphicon glyphicon-circle-arrow-right"></i> パスワードを忘れた方はこちら</a>
                            </div>
                        </div>
                        <a id="register" class="btn btn-block btn-large" href="/signup">会員未登録の方はこちら</a>

                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    <script src="http://cdn.jsdelivr.net/vue/latest/vue.js"></script>
    <script src="/js/vue_sample.js"></script>
@stop

{{--独自のCSSを挿入--}}
@section('styles')
    <link rel="stylesheet" href="userLogin.css">
@stop