@extends('layouts.account')

@section('title','Welcome to pilipili')

@section('background_image'){{url('img/welcome.jpg')}}@endsection

@section('form_content')
    <div>
        <div class="pad-bottom" style="font-weight: bold">
            <a href="{{url('register')}}" role="button" class="btn btn-info btn-block">Register</a>
        </div>
        <div class="pad-bottom" style="font-weight: bold">
            <a href="{{url('login')}}" role="button" class="btn btn-primary btn-block">Login</a>
        </div>
    </div>
@endsection