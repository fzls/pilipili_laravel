{{--TODO: change to the defaullt layout--}}
@extends('layouts.layout')

@section('title','pilipili')

@section('head')
    <style>
        body {
            background: #e4e7ee url("{{url('uploaded_img/bg.jpg')}}") repeat fixed;
        }
    </style>
@endsection

@section('body')
    <div class="container">
        <div class="wrap">
            <div class="col-md-3" id="left-side">
                <section class="content container-fluid" id="current-user">
                    <a href="{{url('user/member')}}?id={{$current_user['id']}}">
                        <div class="col-md-5">
                            <img class="img-user" src="{{$current_user['avatar_filepath']}}" alt="">
                        </div>
                        <div class="col-md-7" style="top: 10px;">
                            <div class="link-black-bold">{{$current_user['pilipili_id']}}</div>
                            <div>View Profile</div>
                        </div>
                    </a>
                </section>
                <div class="content container-fluid text-center">
                    <!--                other user's comments for this users' work -->
                    <a href="{{url('comment/comment_all')}}">Comments</a>
                </div>
                <div class="content">
                    <div class="sec"><a class="link-black"
                                        href="{{url('user/bookmark')}}?type=following">Following</a><span
                                class="pull-right">{{count($followings)}}</span></div>
                    <div>
                        <div class="content">
                            <?php $following_cnt = 0;?>
                            @foreach($followings as $user)
                                <a href="{{url('user/member')}}?id={{$user['id']}}" data-toggle="tooltip"
                                   data-placement="top" title="{{$user['pilipili_id']}}">
                                    <img class="img-following" src="{{$user['avatar_filepath']}}" alt="">
                                </a>
                                @if(++$following_cnt == 10)
                                    @break
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="text-right"><a href="{{url('user/bookmark')}}?type=following">View list</a></div>
                    <hr>
                    <div class="text-right"><a href="{{url('user/bookmark')}}?type=followed_by">Followers</a></div>
                </div>
                <div class="content">
                    <div class="sec"><a class="link-black" href="{{url('search/search_user')}}">Suggested Users</a>
                    </div>
                    <div>
                        <div class="content">
                            <?php $suggested_cnt = 0;?>
                        </div>
                        @foreach($suggested_users as $user)
                            <a href="{{url('user/member.php')}}?id={{$user['id']}}" data-toggle="tooltip"
                               data-placement="top" title="{{$user['pilipili_id']}}">
                                <img class="img-following" src="{{$user['avatar_filepath']}}" alt="">
                            </a>
                            @if(++$suggested_cnt == 10)
                                @break
                            @endif
                        @endforeach
                    </div>
                    <div class="text-right"><a href="{{url('search/search_user')}}">View list</a></div>
                </div>
                <div class="content">
                    <div class="sec link-black">Groups</div>
                    <div class="text-right"><a href="{{url('group')}}">See recently created groups</a></div>
                    <hr>
                    <div class="text-right"><a href="#">Create Group</a></div>
                    <!--                fixme : implement it with js-->
                </div>
            </div>


            <!--        TODO: start from here implemet mid and right-->
            <div class="container-fluid col-md-6" id="mid-side">
                <div class="content">
                    <a href="{{$banner['link']}}"><img src="{{$banner['post_path']}}" alt="" class="img-full-width"></a>
                </div>
                <div class="content">
                    <div class="title"><a class="link-black" href="#">Info</a></div>
                    <div>
                        <div class="container-fluid">
                            <div class="info-item sec col-xs-3">Announcements</div>
                            <div class="col-xs-9"><a href="#">A false announcement link</a></div>
                        </div>
                        <div class="container-fluid">
                            <div class="info-item sec col-xs-3">Events / Contests</div>
                            <div class="col-xs-9"><a href="#">A false Events link</a></div>
                        </div>
                        <div class="container-fluid">
                            <div class="info-item sec col-xs-3">Gallery</div>
                            <div class="col-xs-9"><a href="#">A false gallery link</a></div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <div class="title"><a class="link-black" href="#">pilipili spot light</a></div>
                    <div class="wrap container-fluid">
                        @foreach($spot_lights as $spot_light)
                            <a href="{{url('image/detail')}}?image_id={{$spot_light['id']}}">
                                <img class="img-spot" src="{{$spot_light['filepath']}}" alt="">
                            </a>
                        @endforeach
                    </div>
                    <div class="container-fluid">
                        <a href="#" class="pull-right">»View more</a>
                    </div>
                </div>
                <div class="content">
                    <div class="title"><a class="link-black" href="#">New work: Everyone</a></div>
                    <div class="text-center">
                        <div class="container-fluid">
                            @foreach($new_work_everyone as $work)
                                <div class="col-md-4">
                                    <div>
                                        <a href="{{url('image/detail')}}?image_id={{$work['id']}}">
                                            <img src="{{$work['filepath']}}" alt="" class="img-full-width">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{url('image/detail')}}?image_id={{$work['id']}}">{{$work['name']}}</a>
                                    </div>
                                    <div>
                                        <a href="{{url('user/member_illust')}}?id={{$work['author_id']}}">{{$work->author['pilipili_id']}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="title"><a class="link-black" href="#">Your favorite tags</a></div>
                    <div class="container-fluid">
                        <?php
                        $cols = array('', '', '');
                        foreach ($favorites_tags as $index => $tag) {
                            $cols[$index % 3] .= '
                        <div><a href="' . url('search/search') . '?mode=tag_full&word=' . $tag['name'] . '"><span class="glyphicon glyphicon-tag tag" aria-hidden="true"></span> ' . $tag['name'] . '</a></div>
                        ';
                        }?>
                        <div class="row">
                            @foreach($cols as $col)
                                <div class="col-md-4">{!! $col !!}</div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="title"><a class="link-black" href="#">Frequently checked tags</a></div>
                    <?php $frequent_tags_cnt = count($frequent_tags);?>
                    @if($frequent_tags_cnt!=0)
                        @for ($i = 0; $i < 2; ++$i)
                            <div class="container-fluid">
                                @for ($j = 0; $j < 4; ++$j)
                                    <div class="col-md-3 tag-list">
                                        <div>
                                            {{--note: should use most_viewed_image(), most_viewed_image will fail,cause this is a method, and only--}}
                                            {{--the eloquent relationship can fetch by using attr() or attr(maybe need to set something--}}
                                            <a href="{{url('image/detail')}}?image_id={{$frequent_tags[4 * $i + $j]->most_viewed_image()['id']}}"><img
                                                        src="{{$frequent_tags[4 * $i + $j]->most_viewed_image()['filepath']}}"
                                                        alt=""
                                                        class="img-full-width img-radius"></a>
                                        </div>
                                        <div>
                                            <a href="{{url('search/search')}}?mode=tag_full&word={{$frequent_tags[4 * $i + $j]['name']}}"><span
                                                        class="glyphicon glyphicon-tag tag" aria-hidden="true"></span>
                                                {{$frequent_tags[4 * $i + $j]['name']}}
                                            </a>
                                        </div>
                                    </div>
                                    @if (4 * $i + $j == $frequent_tags_cnt - 1)
                                        @break
                                    @endif
                                @endfor
                            </div>
                            @if (4 * $i + $j == $frequent_tags_cnt - 1)
                                @break
                            @endif
                        @endfor
                    @endif


                </div>

                <div class="content">
                    <div class="title"><a class="link-black" href="#">new work : Following</a></div>
                    <div class="text-center">
                        <div class="container-fluid">
                            @foreach ($new_work_following as $work)
                                <div class="col-md-4">
                                    <div>
                                        <a href="{{url('image/detail')}}?image_id={{$work['id']}}">
                                            <img src="{{$work['filepath']}}" alt="" class="img-full-width">
                                        </a>
                                    </div>
                                    <div>
                                        <a href="{{url('image/detail')}}?image_id={{$work['id']}}">{{$work['name']}}</a>
                                    </div>
                                    <div>
                                        <a href="{{url('user/member_illust')}}?id={{$work['author_id']}}">{{$work->author['pilipili_id']}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid col-md-3" id="right-side">
                <div class="content">
                    <div>
                        <a href={{url($ad['link'])}}><img src="{{url($ad['post_path'])}}" alt="AD"
                                                          class="img-full-width">
                        </a>
                    </div>
                </div>

                <!--            TODO: make all these ranking into one template(with some params)-->
                @foreach($leaderboards as $leaderboard)
                    @include('leaderboard',[
                        'title'=>$leaderboard['title'],
                        'ranking_criteria'=>$leaderboard['ranking_criteria'],
                        'top_3'=>$leaderboard['top_3']
                    ])
                @endforeach
                {{--TODO: get leaderboards data in controller --}}
            </div>
        </div>
    </div>
@endsection