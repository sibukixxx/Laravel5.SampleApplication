@extends('layouts.default')
@section('content')

    <div class="container">
        <div class="row">
            <h1>会社一覧</h1>

            <p>
            <a class="btn btn-primary" href="{{ route('admin.company.create') }}">新規登録</a>
            </p>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>会社名</th>
                    <th>住所</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $company)
                    <tr>
                        <td class="text-left"><a href="{{ route('admin.company.show', ['id' => $company->id]) }}">{{{ $company->company_id }}}</a></td>
                        <td class="text-left">{{{ $company->name }}}</td>
                        <td class="text-left">{{{ $company->name_kana }}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop
@section('styles')
@stop