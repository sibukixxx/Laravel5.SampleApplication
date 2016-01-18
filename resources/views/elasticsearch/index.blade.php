@extends('layouts.default')
@section('content')
<div class="row">
	<div class="well bs-component">
            <h2>Elasticsearch Form</h2>
            <div class="alert alert-dismissable alert-info">
                <strong>Elasticsearchの検索フォーム</strong>
            </div>
    <form action="/elasticsearch/search" role="search" method="get">
        <input type="search" class="form-control" autocomplete="off" name="q" placeholder="キーワードを入力" required>
    </form>
	</div>
</div>
@stop

@section('styles')
    <link href="/assets/css/github.css" rel="stylesheet">
@stop
