<div class="wrap">
    <div id="' . $div_id . '" class="col-md-12 container-fluid">
        <div class="col-md-2">
            <img src="{{url($comment_user['avatar_filepath'])}}" alt="avatar of {{$comment_user['pilipili_id']}}">
        </div>
        <div class="col-md-10">
            <div id="{{$div_id}}_user_info">
                <a href="#">{{$comment_user['pilipili_id']}}</a> {{$comment['created_at']}}
            </div>
            <div id="{{$div_id}}_content">
                <pre>{{$comment['content']}}</pre>
            </div>
            <div>
                <!--TODO: add comment"s user page link after user page done-->
                <!--TODO: add reply-->
                <a href="#">reply</a>
            </div>
        </div>
    </div>
    <div>&nbsp</div>
</div>
