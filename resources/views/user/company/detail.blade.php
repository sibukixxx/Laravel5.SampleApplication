@extends('layouts.default')
@section('content')

    <div class="container">
        <div class="row">
            <h1>詳細</h1>
            @if (isset($company->id))
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>会社名</th>
                        <th>会社かな名</th>
                        <th>国</th>
                        <th>都道府県</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{{ $company->company_id }}}</td>
                        <td>{{{ $company->name }}}</td>
                        <td>{{{ $company->name_kana }}}</td>
                        <td>{{{ $company->country }}}</td>
                        <td>{{{ $company->prefecture }}}</td>
                    </tr>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="{{ route('admin.company.edit', ['id' => $company->id]) }}">編集</a>
            @endif
            <a class="btn btn-material-blue" href="/admin/company">一覧へ戻る</a>
        </div>
    </div>

@stop
@section('styles')
@stop