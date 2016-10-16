<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - powered by 风之凌殇</title>
    @include('layouts.account_head')
    <style>
        body {
            background-image: url("@yield("background_image")");
            background-repeat: no-repeat;
            background-size: cover;
            transition: background-image 0.5s linear;
        }

    </style>
    <script>
//        TODO: implement this when the image is defined
        function change_background(index) {
            var ajax = new XMLHttpRequest();
            var url = "{{url('change_background')}}";
            ajax.onreadystatechange = function () {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    var new_bg = ajax.responseText;
                    document.body.style.backgroundImage = 'url("' + new_bg + '")';
                    setTimeout(function () {
                        change_background();
                    }, 5000);
                }
            };
            ajax.open('get', url, true);
            ajax.send();
        }
        window.onload = function () {
            setTimeout(change_background, 5000);
            var bgm = document.getElementById('bgm');
            bgm.volume = 0.3;
        }
    </script>
</head>
<body>
<div>
    @yield('switch_btn')
    <div class="container">
        <audio id="bgm" src="{{url('music/佐倉綾音 - Daydream café ~ご注文はココアですか？ ver.~.mp3')}}" loop autoplay="autoplay">
            <p>If you are reading this, it is because your browser does not support the audio element.</p>
        </audio>
        <div class="login-form-wrapper">
            <div style="padding-bottom: 50px;">
                <img src="{{url('img/logo.png')}}" alt="pilipili" style="height: 70px;"/> <br/>

                Splice your creating process
            </div>
            <!--form content-->
            @yield('form_content')
            <!--            social media links-->
            <div style="background-color: rgb(255, 255, 255); padding: 20px;">
                <div style="padding: 20px; font-size: 10px;">
                    Begin with an existing account
                </div>
                <div class="btn-group btn-group-justified pad-bottom" role="group">
                    <div class="btn-group pad-horizontal" role="group">
                        <a href="#" role="button" class="btn btn-default"><img src="{{url('img/googleplus30x30.png')}}"
                                                                               alt="Google"/></a>
                    </div>
                    <div class="btn-group pad-horizontal" role="group">
                        <a href="#" role="button" class="btn btn-default"><img src="{{url('img/facebook30x30.png')}}"
                                                                               alt="Facebook"/></a>
                    </div>
                    <div class="btn-group pad-horizontal" role="group">
                        <a href="#" role="button" class="btn btn-default"><img src="{{url('img/twitter30x30.png')}}"
                                                                               alt="Twitter"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer-->
@include('layouts.account_footer')
@include('layouts.google_analytics')
</body>
</html>

