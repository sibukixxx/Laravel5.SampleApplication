<table class="table table-bordered table-hover">
    <thead>
    <tr class="active">
        <th colspan="1"><h2 class="panel-title text-center">学生検索</h2></th>
    </tr>
    </thead>

    {{--@include('shared.errors')--}}

    {{--                                @include('search_condition.company')--}}
    {{--                                @include('search_condition.jon')--}}


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
                       value="検索条件漢字確定文（これを入れておくと、「姓」一文字などのうまくいかない検索キーワードが、うまくいくようになる）"/>
                <td><input type="text" name="st_family_name_search"
                           class="input06"/>&nbsp;
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
                <td><input type="text" name="st_tel_jitaku_search" class="input06">
                </td>
            </tr>

            <tr>
                <td>性別</td>
                <td>
                    <?php echo Form::select('sex'
                            , \App\Libraries\MasterData::sex()
                            , null
                    ) ?>
                </td>
                <td>未既婚</td>
                <td>
                    <?php echo Form::select('marriage'
                            , \App\Libraries\MasterData::marriage()
                            , null
                    ) ?>
                </td>
            </tr>
            <tr>
                <td>郵便番号</td>
                <td>
                    <input type="text" name="st_postcode_search" class="input06">
                </td>
                <td>都道府県</td>
                <td>
                    <?php echo Form::select('prefecture'
                            , \App\Libraries\MasterData::pref()
                            , null
                    ) ?>
                </td>
            </tr>
            <tr>
                <td align="right" colspan="4">
                    <div class="">
                        <input type="submit" class="btn btn-info" id="_submit"
                               name="_submit"
                               value="検索する">
                        <input type="button" class="btn btn-warning" id="_reset"
                               name="_reset"
                               value="クリア">
                    </div>
                </td>
            </tr>
        </div>
    </fieldset>
</table>