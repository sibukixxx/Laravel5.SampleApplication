@extends('layouts.user_default')
@section('content')

    <div class="container-fluid publicDocBlock">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>@if (isset($form_contents['username']))確認 @else お問い合わせ @endif </h2>
            </div>

        </div>
        <div class="row">

            <div class="col-sm-offset-2 col-sm-8">

                @if (empty($form_contents))
                <form method="POST" action="/contact/confirm" accept-charset="UTF-8" class="" role="form">
                <input name="_token" type="hidden" value="ru6e97ShJmQ0nrJEaoFHasasc4i1x39JU3G1QFS6nV">
                @else
                <form method="POST" action="/contact/send" accept-charset="UTF-8" class="" role="form">
                <input name="_token" type="hidden" value="ru6e97ShJmQ0nrJEaoFHasasc4i1x39JU3G1QFS6nV">
                @endif


                    <fieldset>
                        @if (empty($form_contents['username']))
                            <div class="text-danger text-right">
                                * 必須項目
                            </div>
                        @else
                        @endif


                        <div class="form-group required ">
                            <label for="username" class="control-label" for="username">お名前</label>
                            @if (empty($form_contents['username']))
                                <span class="text-danger">*</span>
                                <input class="form-control" placeholder="鈴木 一郎" required="required"
                                       autofocus="autofocus" name="username" type="text" id="username">
                            @else
                                <div>
                                    <?php echo $form_contents['username'] ?>
                                    <input type="hidden" name="username" value="<?php echo $form_contents['username'] ?>">
                                </div>
                            @endif
                        </div>


                        <div class="form-group required ">
                            <label for="email" class="control-label" for="email">メールアドレス</label>
                            @if (empty($form_contents['email']))
                                <span class="text-danger">*</span>
                                <input class="form-control" placeholder="example@gmail.com" required="required"
                                       name="email" type="email" id="email">
                            @else
                                <div>
                                    <?php echo $form_contents['email'] ?>
                                    <input type="hidden" name="email" value="<?php echo $form_contents['email'] ?>">
                                </div>
                            @endif
                        </div>

                        <div class="form-group required ">
                            <label for="content" class="control-label" for="content">お問い合わせ内容</label>
                            @if (empty($form_contents['content']))
                                <span class="text-danger">*</span>
                                <textarea class="form-control" rows="6" required="required" name="content" cols="50"
                                          id="content"></textarea>
                            @else
                                <div>
                                    <?php echo $form_contents['content'] ?>
                                    <input type="hidden" name="content" value="<?php echo $form_contents['content'] ?>">
                                </div>
                            @endif

                        </div>

                        @if (empty($form_contents['content']))
                            <div class="form-group text-center">
                                <input class="btn btn-primary" type="submit" value="確認する">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                        @else
                            <div class="form-group text-center">
                                <input class="btn btn-primary" type="submit" value="送信する">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                            </div>
                        @endif

                    </fieldset>
                </form>
            </div>
        </div>
    </div>


    </div>
    </div>
@stop
@section('styles')
@stop