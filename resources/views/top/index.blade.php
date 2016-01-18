@extends('layouts.user_default')
@section('content')

    <div class="container-fluid publicDocBlock">

        <div class="row">
            <div class="col-md-12">
                <p>こんにちは！！ {{ $name }} さん</p>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>募集タイトル</th>
                        <th>募集期間</th>
                        <th>給与</th>
                        <th>募集ステータス</th>
                        <th>いいね</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left">アルバイト募集してます</td>
                            <td class="text-left">2015年12月4日　～　2015年12月4日まで</td>
                            <td class="text-left">時給1,000円</td>
                            <td class="text-left">募集中</td>
                            <td class="text-left"><input type="button" value="興味あり"/></td>
                        </tr>

                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        Level 2: .col-md-6
                    </div>
                    <div class="col-md-6">
                        Level 2: .col-md-6
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('styles')
    {{--<link href="/stylus/header.css" rel="stylesheet">--}}
@stop