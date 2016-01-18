@extends('layouts.default')
@section('content')

    <div class="container">
        <div class="row">
            <h1>@if (isset($company->id))編集 @else 新規作成 @endif </h1>

            <form class="form-group" method="post"
                  action="@if (isset($company->id)){{{ route('admin.company.update', ['id' => $company->id]) }}} @else{{{ route('admin.company.store') }}} @endif">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if (isset($company->id))<input name="_method" type="hidden" value="PUT"> @endif
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>会社名</th>
                        <th>会社かな名</th>
                        <th>国</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input name="company_id" type="text" value="{{{ $company->company_id or ''}}}"></td>
                        <td><input name="name" type="text" value="{{{ $company->name or ''}}}"></td>
                        <td><input name="name_kana" type="text" value="{{{ $company->name_kana or ''}}}"></td>
                        <td><input name="country" type="text" value="{{{ $company->country or ''}}}"></td>
                    </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-primary" value="@if (isset($company->id))更新 @else 作成 @endif">
                <a class="btn btn-" href="/admin/company">キャンセル</a>
            </form>
            @if (isset($company->id))
                <form class="form-group" method="POST"
                      action="{{{ route('admin.company.destroy', ['id' => $company->id]) }}}">
                    <input name="_method" type="hidden" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-danger" value="削除">
                </form>
            @endif
        </div>
    </div>

@stop
@section('styles')
@stop