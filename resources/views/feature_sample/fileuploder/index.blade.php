@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="well bs-component">
            <h2>ファイルアップローだ～</h2>

            <div class="alert alert-dismissable alert-info">
                <strong>TODO</strong>
                <li>ファイルをアップロードする（S3 や Disk 、 DB等）</li>
                <li>ファイルには有効期限があり、それを過ぎるとダウンロードできなくなる</li>
                <li>リストにも表示されなくなります(保存先の実ファイルも削除されていることが望ましい</li>
                <li>プライベートモードの実装</li>
                <li>ファイルにはパスワードを設定できる</li>
                <li>パスワードを用いることで、有効期限をまたずにファイルのダウンロードを無効化することが出来る</li>
                <li>パスワードを生で保存しない</li>
                <li>バリデーション（画像形式・ファイルサイズ）</li>
                <li>プレビュー機能（画像の場合）</li>
            </div>
            {{--<form action="/elasticsearch/search" role="search" method="get">--}}
            {{--<input type="search" class="form-control" autocomplete="off" name="q" placeholder="キーワードを入力" required>--}}
            {{--</form>--}}
            <div>
                <label class="checkbox-inline">
                    <h4>ローカルアップロード</h4>

                    <form action="/feature_sample/fileuploder/fileUploadtoLocal" method="post" name="fileupload"
                          enctype="multipart/form-data">
                        <input type="file" name="input_file">
                        <input type="submit" value="送信">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </label>

                <label class="checkbox-inline">
                    <h4>S3アップロード</h4>

                    <form action="/feature_sample/fileuploder/fileUploadtoS3" method="post" name="fileupload"
                          enctype="multipart/form-data">
                        <input type="file" name="input_file">
                        <input type="submit" value="送信">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </label>

                <label class="checkbox-inline">
                    <h4>DBへアップロード</h4>

                    <form action="/feature_sample/fileuploder/fileUploadtoDB" method="post" name="fileupload"
                          enctype="multipart/form-data">
                        <input type="file" name="input_file">
                        <input type="submit" value="送信">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                    </form>
                </label>
            </div>
        </div>
    </div>


@stop
@section('styles')
@stop