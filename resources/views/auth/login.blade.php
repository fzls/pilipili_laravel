@extends('layouts.account')

@section('title','Login | pilipili')

@section('background_image'){{url('img/login.jpg')}}@endsection

@section('switch_btn')
    <div class="pull-right" style="padding: 10px;">
        <a href="{{url('/register')}}" role="button" class="btn-lg btn-info btn-block"
           style="text-decoration: none; font-size: 10px;">Register</a>
    </div>
@endsection

@section('form_content')
    <div>
        <form action="{{url('/login')}}" role="form" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" id="email_or_id" name="email_or_id"
                       placeholder="E-mail address / pilipili ID">
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Password"/>
                <div class="checkbox text-left small">
                    <label>
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>

            @if ($errors->has('email_or_id'))
                <div class="form-control error-prompt">
            <span class="input-xlarge uneditable-input pull-left" style="font-size: 10px;color:Silver;">
                {{$errors->first('email_or_id')}}
            </span>
                </div>
            @endif
            @if ($errors->has('password'))
                <div class="form-control error-prompt">
            <span class="input-xlarge uneditable-input pull-left" style="font-size: 10px;color:Silver;display: block;">
                {{$errors->first('password')}}
            </span>
                </div>
            @endif
            <button type="submit" class="btn btn-info btn-block">Login</button>
        </form>
        <div class="pull-right" style="font-size: 12px; padding: 5px; text-decoration: none; color: #666;"><a
                    href="{{ url('/password/reset') }}">I forgot</a>
        </div>
    </div>
@endsection
