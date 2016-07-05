@extends('layouts.layout')

@section('title')
    「{{$img['name']}}」 / 「{{$author['pilipili_id']}}」 [pilipili]
@endsection

@section('head')
    <style>
        body {
            /*<!--TODO: check if not set custom background-->*/
            background: url("{{url($author['custom_background_image_filepath'])}}") no-repeat;
            background-size: 100%;
            background-attachment: fixed;
            /*background-position: center;*/
        }

        img {
            max-width: 100%
        }
    </style>
    <script>
        function rating() {
            var score = parseInt(document.getElementById('rating-input').value);
            if (isNaN(score)) {
                alert('must input number type');
                return;
            }
            if (score < 0 || score > 10) {
                alert('score should between 0 and 10 (inclusive)');
                return;
            }

            //server update model
            var xmlhttp = new XMLHttpRequest();
            var url = '{{url('image/rating')}}';
            var params = 'score=' + score + '&user_id={{$current_user['id']}}&image_id={{$image_id}}';
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //local update view
                    document.getElementById('rating-ratings').innerText = parseInt(document.getElementById('rating-ratings').innerText) + 1;
                    document.getElementById('rating-total-score').innerText = parseInt(document.getElementById('rating-total-score').innerText) + score;
                    document.getElementById('rating-unrated').style = 'display: none;';
                    document.getElementById('rating-rated').style = 'display: block;';
                    document.getElementById('rating-rated').innerHTML = 'Your have rated it : ' + score;
                }
            };
            xmlhttp.open('Post', url, true);
            xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(params);
        }

        function add_tag() {
            var tag = document.getElementById('add_tag_input').value;
            if (tag.length == 0) {
                alert("You forgot to add your tag");
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            var url = '{{url('image/add_tag')}}';
            var params = "added_user=" + encodeURIComponent({{$current_user['id']}}) +
                    "&image_id=" + encodeURIComponent({{$img['id']}}) +
                    "&tag_name=" + encodeURIComponent(tag);
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById('add_tag_input').value = '';
                    if (xmlhttp.responseText != 'tag existed') {
                        document.getElementById("image_tags").innerHTML += '<div class="inline-block"><a href="{{url('search/search')}}?mode=tag_full&word=' + tag + '"><span class="glyphicon glyphicon-tag tag" aria-hidden="true"></span> ' + tag + '</a></div>';
                    } else {
                        alert(xmlhttp.responseText);
                    }
                }
            }
            xmlhttp.open("POST", url, true);
            xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(params);

        }

        function write_comment() {
            var content = document.getElementById('input_comment').value;
            if (content.length == 0) {
                //TODO: style it
                alert("Your comment is empty");
                return;
            }
            var xmlhttp = new XMLHttpRequest();
            var url = '{{url('image/write_comment')}}';
            var params = "user_id=" + encodeURIComponent({{$current_user['id']}}) +
                    "&image_id=" + encodeURIComponent({{$img['id']}}) +
                    "&content=" + encodeURIComponent(content);
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    @if($display_desc)
                        document.getElementById('area_comments').innerHTML = xmlhttp.responseText + document.getElementById('area_comments').innerHTML;
                    @else
                        document.getElementById('area_comments').innerHTML += xmlhttp.responseText;
                    @endif
                    document.getElementById('input_comment').value = '';
                }
            };
            xmlhttp.open("POST", url, true);
            xmlhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
            xmlhttp.send(params);

        }
    </script>
@endsection

@section('body')
    <!--TODO: crop image in server side-->
    <div id="content-wrap" class="container">
        <!--    left side-->
        <div class="col-md-2" id="left-side">
            <section id="user-info" class="content text-center sec">
                <div><img src="{{url($author['avatar_filepath'])}}" alt="avatar"></div>
                <div><a href="#user-info">{{$author['pilipili_id']}}</a></div>
                <div><a href="{{url('follow_user')}}" role="button" class="btn btn-default">Follow</a></div>
                <div><a href="{{url('send_request')}}" role="button" class="btn btn-default">Send friend request</a>
                </div>
                <div><a href="{{url('send_message')}}" role="button" class="btn btn-default">Send message</a></div>
            </section>
            <section id="booth" class="content text-center sec">
                This is left unimplemented
            </section>
            <section id="tags_sec" class="content">
                <div style="background-color: #dddddd;"><a href="#" style="color: black;">Illustration Tags</a></div>
                <div id="tags" class="content">
                    @foreach($author_images_tags_links as $link)
                        {!! $link !!}
                    @endforeach
                </div>
                <div><a href="#" class="pull-right">View list</a></div>
            </section>
        </div>

        <!--    mid side-->
        <div class="col-md-8 content" id="mid-side">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="nav">
                        <ul class="nav navbar-nav">
                            <li><a href="#">Profile</a></li>
                            <li class="active"><a href="#">Works</a></li>
                            <li><a href="#">Bookmarks</a></li>
                            <li><a href="#">Feed</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!--            <section id="other-works" class="text-center">-->
            <!--                <div class="col-md-5 text-right">-->
            <!--                    <span class="col-md-7"><a href="#" class="pull-right">Another work</a></span>-->
            <!--                    <span class="col-md-5"><a href="#"><img src="../img/other_work_1.jpg" alt=""></a></span>-->
            <!--                </div>-->
            <!--                <div class="col-md-2">-->
            <!--                    <a href="#">Works</a>-->
            <!--                </div>-->
            <!--                <div class="col-md-5 text-left">-->
            <!--                    <span class="col-md-5"><a href="#"><img src="../img/other_work_2.jpg" alt=""></a></span>-->
            <!--                    <span class="col-md-7"><a href="#" class="pull-left">Yet another work</a></span>-->
            <!--                </div>-->
            <!--            </section>-->

            <section id="pic-info">
                <div class="col-md-6">
                    <div>{{$img['created_at']}} | {{$img['resolution_width']}}x{{$img['resolution_height']}} | <a
                                href="#">{{$image_category}}</a></div>
                    <div><h1>{{$img['name']}}</h1></div>
                </div>
                <div class="col-md-6 text-right">
                    <div>Views: {{$img['views']}} Ratings: <span id="rating-ratings">{{$img['ratings']}}</span> Total
                        score: <span id="rating-total-score">{{$img['total_score']}}</span></div>
                    <!-- fixme: implement rating by JS-->
                    <!--                todo: onload page, use php to check which one to use-->

                    <div id="rating-unrated"<?php if ($rated) echo ' style="display:none"'; ?>>
                        @if(!$rated)
                            <div>
                                <div class="col-md-8 col-md-offset-4">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Score: 0~10" type="number"
                                               min="0"
                                               max="10" id="rating-input">
                                <span class="input-group-btn">
                                <button onclick="rating()" class="btn btn-info" type="button">
                                    Rate it
                                </button>
                                </span>
                                    </div>
                                </div>
                            </div>
                            <div><b>This will be implement rating by JS later</b></div>
                        @endif
                    </div>
                    <div id="rating-rated"<?php if (!$rated) echo ' style="display:none"'; ?>>
                        @if($rated)
                            Your have rated it : {{$rating}}
                        @endif
                    </div>
                </div>
            </section>
            <div class="col-md-12 container-fluid">
                <div class="sec" id="image_tags">
                    @foreach ($image_tags as $tag)
                        <div class="inline-block"><a
                                    href="{{url('search/search')}}?mode=tag_full&word={{$tag['name']}}"><span
                                        class="glyphicon glyphicon-tag tag" aria-hidden="true"></span> {{$tag['name']}}
                            </a></div>
                    @endforeach
                </div>
                <form class="form-inline pull-right" id="add_tag_form">
                    <input type="text" class="form-control" id="add_tag_input" placeholder="Your tag">
                    <button accesskey="t" type="button" class="btn btn-default" onclick="add_tag()"
                            data-toggle="tooltip"
                            title="Alt + T">Add Tag
                    </button>
                </form>
            </div>
            <div id="img" class="col-md-10 col-md-offset-1 content">
                <img src="{{url($img['filepath'])}}" alt="detail">
            </div>

            <!--below is comments-->
            <div id="comments" class="container-fluid col-sm-10">
                <!--            input-->
                <div id="area_input">
                    <div class="col-sm-2">
                        <img src="{{url($current_user['avatar_filepath'])}}" alt="avatar">
                    </div>
                    <div class="col-sm-10">
                        <form role="form">
                            <ul class="nav nav-tabs">
                                <li role="presentation" class="active"><a href="#">Comments</a></li>
                                <li role="presentation"><a href="#">Stickers</a></li>
                            </ul>
                        <textarea style="height: 100px;max-height: 100px;min-height: 100px;" id="input_comment"
                                  name="input_comment"
                                  placeholder="please enter your comment" class="form-control"></textarea>
                            <div>
                                <button type="button" class="btn btn-default">Emoij</button>
                                <button accesskey="c" onclick="write_comment()" type="button"
                                        class="pull-right btn btn-info" data-toggle="tooltip" title="Alt + C">
                                    &nbsp&nbsp&nbsp Send
                                    &nbsp&nbsp&nbsp
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--            display exists comments-->
                <div id="area_comments">
                    @foreach ($comments as $comment)
                        @include('image.display_comment',[
                            'comment'=>$comment,
                            'comment_user'=>$comment->user,
                            'div_id'=>'area_comments_' . $comment['id']
                         ])
                    @endforeach
                </div>
            </div>
            <!--above is comments-->
        </div>

        <!--    right side-->
        <div class="col-md-2" id="right-side">
            <h5>Recommendation</h5>
            @foreach ($recommended_images as $image)
                <div class="content">
                    <a href="{{url('image/detail')}}?image_id={{$image['id']}}">
                        <img src="{{url($image['filepath'])}}" alt="rec1" class="rec-img">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection