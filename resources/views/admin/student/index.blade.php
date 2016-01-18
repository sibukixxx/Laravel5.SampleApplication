@extends('layouts.default')
@section('content')


    <div id="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-md-offset-1">
                    <form role="form" action="/admin/login/check" method="POST">

                        <table class="table table-bordered table-hover">
                            <tbody>
                            <tr>
                                <th colspan="1">学生検索</th>
                            </tr>
                            </tbody>

                            <fieldset>
                                <div class="form-group">

                                    <tr>
                                        <td>学生ID</td>
                                        <td>
                                            <input type="text" name="st_id_search" class="">&nbsp;
                                            {{--<select name="st_id_condition">--}}
                                                {{--<option value="1">部分</option>--}}
                                                {{--<option value="2">完全</option>--}}
                                            {{--</select>--}}
                                        </td>
                                        <td colspan=2>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>学生氏名（漢字姓）</td>
                                        <input type="hidden" name="kanjikakutei"
                                               value="検索条件漢字確定文（これを入れておくと、「姓」一文字などのうまくいかない検索キーワードが、うまくいくようになる）"/>
                                        <td><input type="text" name="st_family_name_search" class="input06"/>&nbsp;
                                            {{--<select name="st_family_name_condition">--}}
                                                {{--<option value="1">部分</option>--}}
                                                {{--<option value="2">完全</option>--}}
                                            {{--</select>--}}
                                        </td>
                                        <td>学生氏名（漢字名）</td>
                                        <td><input type="text" name="st_first_name_search" class="input06">&nbsp;
                                            {{--<select name="st_first_name_condition">--}}
                                                {{--<option value="1">部分</option>--}}
                                                {{--<option value="2">完全</option>--}}
                                            {{--</select>--}}
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
        </div>
    </div>
@stop
@section('styles')
@stop