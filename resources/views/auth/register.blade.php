@extends('layouts.account')

@section('title','Register | pilipili')

@section('background_image'){{url('img/signup.jpg')}}@endsection

@section('switch_btn')
    <div class="pull-right" style="padding: 10px;">
        <a href="{{url('/login')}}" role="button" class="btn-lg btn-info btn-block"
           style="text-decoration: none; font-size: 10px;">Login</a>
    </div>
@endsection

@section('form_content')
    <div>
        <form action="{{url('/register')}}" role="form" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail address">
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Password"/>
                <input type="text" class="form-control" id="pilipili_id" name="pilipili_id" placeholder="pilipili ID"/>
                <div class="form-control"><span class="input-xlarge uneditable-input pull-left"
                                                style="font-size: 10px;color:Silver;">This will be used in your profile URL etc.</span>
                </div>
            </div>

            @if ($errors->has('email'))
                <div class="form-control error-prompt">
            <span class="input-xlarge uneditable-input pull-left" style="font-size: 10px;color:Silver;">
                {{$errors->first('email')}}
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

            @if ($errors->has('pilipili_id'))
                <div class="form-control error-prompt">
            <span class="input-xlarge uneditable-input pull-left" style="font-size: 10px;color:Silver;display: block;">
                {{$errors->first('pilipili_id')}}
            </span>
                </div>
            @endif

            <button type="submit" class="btn btn-info btn-block">Register</button>
        </form>
        <div class="pull-right" style="font-size: 12px; padding: 5px; text-decoration: none; color: #666;"><a
                    href="{{ url('/password/reset') }}">I forgot</a>
        </div>
    </div>
@endsection
