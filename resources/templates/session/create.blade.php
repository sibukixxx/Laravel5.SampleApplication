<?php

@extends('layouts.default')

@section('content')
    <h1>Sign In Form</h1>

    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach

    {!! Form::open(['route'=>'session']) !!}
    <div>
        {!!Form::label('email', 'Email')!!}
        {!!Form::email('email')!!}
    </div>
    <div>
        {!!Form::label('password', 'Password')!!}
        {!!Form::password('password')!!}
    </div>
    <div>
        {!!Form::submit('Submit')!!}
    </div>
    {!! Form::close() !!}
@stop