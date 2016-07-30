<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Pilipili\Banner;
use Pilipili\ClickImageEvent;
use Pilipili\Comment;
use Pilipili\Image;
use Pilipili\ImageCategory;
use Pilipili\ImageTag;
use Pilipili\RateImageEvent;
use Pilipili\Tag;
use Pilipili\User;
use Illuminate\Http\Request;

//validate data
Route::group(['as' => 'home.'], function () {
    Route::get('/', [
        'as'   => 'index',
        'uses' => 'HomeController@index',
    ]);
    Route::get('home', [
        'as'   => 'index',
        'uses' => 'HomeController@index',
    ]);
    Route::get('help', [
        'as'   => 'help',
        'uses' => 'HomeController@help',
    ]);
});

Route::group(['prefix' => 'image', 'as' => 'image.'], function () {
    Route::get('upload', [
        'as'   => 'upload',
        'uses' => 'ImageController@show_upload_form',
    ]);
    Route::post('upload', [
        'as'   => 'save_image_in_server',
        'uses' => 'ImageController@upload_images',
    ]);
    Route::post('rating', [
        'as'   => 'rating',
        'uses' => 'ImageController@rate_it',
    ]);
    Route::post('add_tag', [
        'as'   => 'tagging',
        'uses' => 'ImageController@tag_it',
    ]);
    Route::post('write_comment', [
        'as'   => 'commenting',
        'uses' => 'ImageController@comment_it',
    ]);
    Route::get('detail', [
        'as'   => 'show',
        'uses' => 'ImageController@show_image',
    ]);
});

Route::group([], function () {
    Route::auth();
    Route::get('welcome', [
        'as'   => 'welcome',
        'uses' => 'Auth\AuthController@show_welcome_page',
    ]);
    Route::get('change_background', [
        'as'   => 'change_background',
        'uses' => 'Auth\AuthController@change_background',
    ]);
});

//below is for test only
function p($s){
    echo $s.'<br>';
}
Route::get('test', function (Request $request) {
    
//    $page = User::paginate(5);
//    foreach ($page as $user) {
//        p($user->id.' : '.$user->pilipili_id);
//    }
////    $page->setPath(url('path/233/hhh'));
//    $page->appends(['method'=>'post','action'=>'test'])->fragment('meow');
//    p($page->firstItem());
//    p($page->nextPageUrl());
//    p($page->previousPageUrl());
//    p($page->links());
//    $collection = collect([
//                              10 => ['product' => 'Desk', 'price' => 200],
//                              11 => ['product' => 'Desk', 'price' => 200],
//                          ]);
//
//    $values = $collection->values();
//
//    print_r($values->all()) ;
//    return pathinfo('动漫【风之凌殇】2.jpg', PATHINFO_EXTENSION);
//    $a = [];
//    for($i=0;$i<10;++$i) $a[]=$i;
//    print_r($a);
//    $_rate = RateImageEvent::where('user_id',1)
//        ->where('image_id',1)->first();
//    $rated = $_rate !=null;
//    if($rated) $rating = $_rate->score;
//    echo $_rate;
//    $comments= Image::find(1)->comments->sortByDesc('id');
//    foreach ($comments as $comment) {
//        echo $comment['id'] . ' -> '.$comment['content'].'<br>';
//    }
//    $image = Image::find(1);
//    $comments = $image->comments;
//    foreach ($comments as $comment) {
//        print_r($comment->content);
//        print_r('<br>');
//    }
//    $user = User::find(1);
//    foreach ($user->followings as $following) {
//        print_r($following->pilipili_id);
//        print_r('   ' . $following['pilipili_id']);
//        print_r('<br>');
//    }
//    $banner = Banner::find(1);
//    print_r($banner);
//    $work = Image::find(1);
//    print_r($work->author['pilipili_id']);
//    $banner=Banner::orderBy('id','desc')->first();
//    print_r($banner->link);

//      $image=Image::find(1);
//      print_r(($image->visits[0]->image_id));
//      echo '<br>';
//      print_r($image->visits()->where('created_at','>=',0)->get());
//      echo '<br>';
//      echo count($image->visits_after(Carbon::now()->subDay()));
//    $frequent_tags = Tag::all()->sortByDesc(function ($tag) {
//        return count($tag->images);
//    });
//    foreach ($frequent_tags as $frequent_tag) {
//        print_r($frequent_tag->name.' '.count($frequent_tag->images).'<br>');
//    }
//    $tag = Tag::find(1);
//    echo $tag->most_viewed_image()['filepath'];
//    $frequent_tags = Tag::all()->sortByDesc(function ($tag) {
//            return count($tag->images());
//        });
//    foreach ($frequent_tags as $k => $v) {
//        echo $v->most_viewed_image.' <br>';
//    }
});
