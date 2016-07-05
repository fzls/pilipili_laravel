<div class="content">
    <div class="sec"><a class="link-black"
                        href="{{url('ranking/ranking')}}?criteria={{$ranking_criteria}}">{{$title}}</a></div>
    <?php $index = 0;?>
    @foreach ($top_3 as $image)
        {{--index is 0,1,2 so 0 and 2 is the odd one--}}
        <div class="ranking{{$index % 2 === 0 ? ' ranking-odd' : ''}} container-fluid pad-zero">
            <div class="col-md-6 pad-five">
                <a href="{{url('image/detail')}}?image_id={{$image['id']}}">
                    <img src="{{$image['filepath']}}" alt="{{$image['name']}}" class="img-full-width">
                </a>
            </div>
            <div class="col-md-6" style="vertical-align: top;">
                <div><a href="{{url('image/detail')}}?image_id={{$image['id']}}">{{$image['name']}}</a></div>
                <div>By
                    <a href="{{url('user/member')}}?id={{$image['author_id']}}">{{$image->author['pilipili_id']}}</a>
                </div>
                <div class="ranking-num">{{++$index}}</div>
            </div>
        </div>
    @endforeach
</div>