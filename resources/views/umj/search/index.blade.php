@extends('layouts.default')
@section('content')

    <div id="wrapper">
        <div class="container">
            <div class="row">

                <div class="row">
                    <div class="col-xs-10 col-md-offset-1">
                        <form role="form" action="/admin/student/search" method="POST">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#user_search_tab" data-toggle="tab">ユーザー</a></li>
                                <li><a href="#company_search_tab" data-toggle="tab">企業</a></li>
                                <li><a href="#job_search_tab" data-toggle="tab">求人</a></li>
                                <li><a href="#billing_search_tab" data-toggle="tab">請求</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="company_search_tab">工事中</div>
                                <div class="tab-pane" id="job_search_tab">工事中</div>
                                <div class="tab-pane" id="billing_search_tab">工事中</div>
                                <div class="tab-pane fade in active" id="user_search_tab">
                                    @include('umj.search.search_condition.user')
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </form>
                    </div>
                </div>
            </div>
            @stop
            @section('scripts')
                <script src="http://cdn.jsdelivr.net/vue/latest/vue.js"></script>
                <script src="/js/vue_sample.js"></script>
@stop

@section('styles')
@stop