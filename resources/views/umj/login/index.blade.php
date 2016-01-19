@extends('layouts.default')
@section('content')

    <div id="wrapper">
        <div class="container">
            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title text-center"> UMJ管理</h2>
                        </div>

                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ url('/auth/login') }}">

                                {{--@if (count($postData) == 0)--}}
                                    {{--<div class="alert alert-success ">--}}
                                        {{--<button type="button" class="close" data-dismiss="alert"--}}
                                                {{--aria-hidden="true">&times;</button>--}}
                                        {{--success.--}}
                                    {{--</div>--}}
                                {{--@else--}}
                                    {{--<div class="alert alert-danger alert-dismissable">--}}
                                        {{--<button type="button" class="close" data-dismiss="modal"--}}
                                                {{--aria-hidden="true">&times;</button>--}}
                                        {{--Bad credentials.--}}
                                    {{--</div>--}}
                                {{--@endif--}}

                                <fieldset>
                                    <div class="form-group">
                                        <label for="username">ユーザ名</label>
                                        <input type="text" id="email" name="email" class="form-control input-lg"
                                               placeholder="ユーザ名(E-mail)" required="required" autofocus="">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">パスワード</label>
                                        <input type="password" id="password" name="password"
                                               class="form-control input-lg"
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
                </div>
            </div>

        </div>
    </div>
@stop
@section('scripts')
    <script src="http://cdn.jsdelivr.net/vue/latest/vue.js"></script>
    <script src="/js/vue_sample.js"></script>
@stop

@section('styles')
@stop


{{--START：ヘルパーの使い方サンプル--}}
{{--<td>--}}
{{--<a href="#"--}}
{{--title="aqq11121212121212121">{{ Text::shorten('1234567890', 7) }}--}}
{{--</a>--}}
{{--</td>--}}

{{--<?php echo MasterData::sex()["0"] ?>--}}
{{--<?php--}}
{{--foreach ( MasterData::sex() as $sex) {--}}
{{--echo $sex;--}}
{{--}--}}
{{--?>--}}

{{--@foreach (MasterData::sex() as $pref)--}}
{{--<p>This is user {{ $pref }}</p>--}}
{{--<p>This is user {!! $pref !!}</p>--}}
{{--@endforeach--}}

{{--END--}}
