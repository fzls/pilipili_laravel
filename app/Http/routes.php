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
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
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
function p($s) {
    echo $s . '<br>';
}

function get_page($s, $f) {
    $f($s);
}

Route::get('test', function (Request $request) {
    get_page('23333333333', 'p');
});

Route::get('proxy', 'ProxyController@corsProxy');
