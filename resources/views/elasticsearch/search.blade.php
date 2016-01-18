@extends('layouts.default')
@section('content')
<div class="row">
        <div class="well bs-component">
    @if(!empty($docs))
        @foreach($docs as $doc)
            <span class="btn btn-info">タイトル</span>　<span>{{ $doc['_source']['title'] }}</span><br><p></p>
            <span class="btn btn-danger">内容</span>　<span>{{ $doc['_source']['body'] }}</span>
            <hr>
        @endforeach
    @else
        <p>見つかりませんでした</p>
    @endif
        </div>
</div>
@stop
