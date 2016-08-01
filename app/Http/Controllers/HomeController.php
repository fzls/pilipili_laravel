<?php

namespace Pilipili\Http\Controllers;

use Pilipili\Ad;
use Pilipili\Banner;
use Pilipili\Http\Requests;
use Pilipili\Image;
use Pilipili\Tag;
use Pilipili\User;
use Carbon\Carbon;
use Auth;
use Cache;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $current_user = Auth::user();

        /*fetch from cache if cached*/
        $cache_key = 'index:'.$current_user->id;
        if(Cache::has($cache_key)){
            return Cache::get($cache_key);
        }

        $followings = $current_user->followings;
        $suggested_users = User::whereNotIn('id', $followings->pluck('id'))->where('id', '!=', $current_user->id)->orderByRaw('rand()')->take(10)->get();
        $banner = Banner::orderBy('id', 'desc')->first();
        $spot_lights = Image::orderBy('views', 'desc')->with('author')->take(4)->get();
        $new_work_everyone = Image::orderBy('id', 'desc')->with('author')->take(6)->get();
        $favorites_tags = $current_user->tags;
        $frequent_tags = Tag::with('images')->get()->sortByDesc(function ($tag) {
            return count($tag->images());
        });
        $new_work_following = Image::whereIn('author_id', $followings->pluck('id'))->orderBy('id', 'desc')->with('author')->take(6)->get();
        $ad = Ad::orderBy('id', 'desc')->first();
        $leaderboards = [
            [
                'title'            => 'Global Most Viewed',
                'ranking_criteria' => 'views',
                'top_3'            => Image::orderBy('views', 'desc')->with('author')->take(3)->get(),
            ],
            [
                'title'            => 'Daily Views Rankings',
                'ranking_criteria' => 'daily',
                'top_3'            => Image::with('visits')->get()->sortByDesc(function ($image) {
                    return count($image->visits_after(Carbon::now()->subDay()));
                })->take(3),
            ],
            [
                'title'            => 'Global Rated Rankings',
                'ranking_criteria' => 'popularity',
                'top_3'            => Image::orderBy('ratings', 'desc')->orderBy('views', 'desc')->with('author')->take(3)->get(),
            ],
            [
                'title'            => 'Global Popularity Rankings',
                'ranking_criteria' => 'popularity',
                'top_3'            => Image::orderBy('total_score', 'desc')->orderBy('views', 'desc')->with('author')->take(3)->get(),
            ],
            [
                'title'            => 'Daily Popularity Rankings',
                'ranking_criteria' => 'original',
                'top_3'            => Image::with('rates')->get()->sortByDesc(function ($image) {
                    return count($image->rates_after(Carbon::now()->subDay()));
                })->take(3),
            ],
        ];

        $page = view('home', [
            'current_user'       => $current_user,
            'followings'         => $followings,
            'suggested_users'    => $suggested_users,
            'banner'             => $banner,
            'spot_lights'        => $spot_lights,
            'new_work_everyone'  => $new_work_everyone,
            'favorites_tags'     => $favorites_tags,
            'frequent_tags'      => $frequent_tags,
            'new_work_following' => $new_work_following,
            'ad'                 => $ad,
            'leaderboards'       => $leaderboards,
        ])->render();

        /*save rendered page into cache for 30 mins*/
        Cache::add($cache_key,$page,30);

        return $page;
    }

    public function help() {
        if(Cache::has('help')){
            return Cache::get('help');
        }

        $page= view('help')->render();

        Cache::add('help',$page,60*24);

        return $page;
    }
}
