@extends('layouts.default')
@section('content')

    <div class="container">
        <div class="row">
            <h2>@if (isset($company->id))会社情報編集 @else 会社情報新規作成 @endif </h2>

            <form class="form-group" method="post"
                  action="@if (isset($company->id)){{{ route('admin.company.update', ['id' => $company->id]) }}} @else{{{ route('admin.company.store') }}} @endif">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                @if (isset($company->id))<input name="_method" type="hidden" value="PUT"> @endif
                <table class="table table-bordered table-hover table-striped">
                    <div class="form-group">
                        <label for="name">会社名</label>
                        <input type="text" class="form-control" id="name" name='name' placeholder="会社名"
                               value="{{{ $company->name or ''}}}">
                    </div>
                    <div class="form-group">
                        <label for="country">国</label>
                        <input type="text" class="form-control" id="country" name='country' placeholder="英略2文字"
                               value="{{{ $company->country or ''}}}">
                    </div>
                    <div class="form-group">
                        <label for="prefecture">都道府県</label>
                        <input type="text" class="form-control" id="prefecture" name='prefecture' placeholder="23"
                               value="{{{ $company->prefecture or ''}}}">
                    </div>
                    <div class="form-group">
                        <label for="address">住所</label>
                        <input type="text" class="form-control" id="address" name='address' placeholder="新宿区新宿1-22-1"
                               value="{{{ $company->address or ''}}}">

                    </div>
                    <div class="form-group">
                        <label for="postal_code">郵便番号</label>
                        <input type="text" class="form-control" id="postal_code" name='postal_code' placeholder="000-1111"
                               value="{{{ $company->postal_code or ''}}}">
                    </div>
                    <div class="form-group">
                        <label for="telephone">電話番号</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="080-9999-9999"
                               value="{{{ $company->telephone or ''}}}">
                    </div>

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