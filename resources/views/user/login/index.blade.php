@extends('layouts.default')
@section('content')

    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-md-offset-1">
                    <form role="form" action="/admin/student/search" method="POST">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr class="active">
                                <th colspan="1"><h2 class="panel-title text-center">学生検索</h2></th>
                            </tr>
                            </thead>
                            <fieldset>
                                <div class="form-group">
                                    <tr>
                                        <td>学生ID</td>
                                        <td>
                                            <input type="text" name="st_id_search" class="">&nbsp;
                                            <select name="st_id_condition">
                                                <option value="1">部分</option>
                                                <option value="2">完全</option>
                                            </select>
                                        </td>
                                        <td colspan=2>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>学生氏名（漢字姓）</td>
                                        <input type="hidden" name="kanjikakutei"
                                               value="検索条件漢字確定文（これを入れておくと、「姓」一文字などのうまくいかない検索キーワードが、うまくいくようになる）"/>ぶ
                                        <td><input type="text" name="st_family_name_search" class="input06"/>&nbsp;
                                            <select name="st_family_name_condition">
                                                <option value="1">部分</option>
                                                <option value="2">完全</option>
                                            </select>
                                        </td>
                                        <td>学生氏名（漢字名）</td>
                                        <td><input type="text" name="st_first_name_search" class="input06">&nbsp;
                                            <select name="st_first_name_condition">
                                                <option value="1">部分</option>
                                                <option value="2">完全</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>メールアドレス</td>
                                        <td><input type="text" name="st_mail_search" class="input06"></td>
                                        <td>自宅電話番号</td>
                                        <td><input type="text" name="st_tel_jitaku_search" class="input06"></td>
                                    </tr>

                                    <tr>
                                        <td>性別</td>
                                        <td>
                                            <select name="st_sem_id_search">
                                                <option value="">選択しない</option>
                                                <option value="1">男性</option>
                                                <option value="2">女性</option>
                                            </select>
                                        </td>
                                        <td>未既婚</td>
                                        <td>
                                            <select name="st_mam_id_search">
                                                <option value="">選択しない</option>
                                                <option value="1">未婚</option>
                                                <option value="2">既婚</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>郵便番号</td>
                                        <td>
                                            <input type="text" name="st_postcode_search" class="input06">
                                        </td>
                                        <td>都道府県</td>
                                        <td>
                                            <select name="st_prm_id_search">
                                                <option value="">選択しない</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right" colspan="4">
                                            <div class="">
                                                <input type="submit" class="btn btn-info"    id="_submit" name="_submit" value="検索する">
                                                <input type="button" class="btn btn-warning" id="_reset" name="_reset" value="クリア">
                                            </div>
                                        </td>
                                    </tr>
                                </div>
                            </fieldset>
                        </table>
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title text-center"> Foreign students Management System</h2>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="/admin/login/check" method="POST">
                                <?php /**/ if (empty($postData)) {
                                    $postData = 0;
                                } /**/ ?>
                                @if (count($postData) > 0)
                                    <div class="alert alert-success ">
                                        <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                        success.
                                    </div>
                                @else
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        Bad credentials.
                                    </div>
                                @endif

                                <fieldset>
                                    <div class="form-group">
                                        <label for="username">ユーザ名</label>
                                        <input type="text" id="username" name="_username" class="form-control input-lg"
                                               placeholder="ユーザ名" required="required" autofocus="">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">パスワード</label>
                                        <input type="password" id="password" name="_password"
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