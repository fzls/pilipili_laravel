<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pilipili_id', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
    public function visited_images(){
        return $this->belongsToMany('App\Image','click_image_events');
    }
    
    public function rated_images(){
        return $this->belongsToMany('App\Image','rate_image_events');
    }
    
    public function visits(){
        return $this->hasMany('App\ClickImageEvent');
    }
    
    public function rates(){
        return $this->hasMany('App\RateImageEvent');
    }
    
    public function works(){
        return $this->hasMany('App\Image','author_id');
    }
    
    public function followings(){
        return $this->belongsToMany('App\User','follows','follower_id','followee_id');
    }
    
    public function followers(){
        return $this->belongsToMany('App\User','follows','followee_id','follower_id');
    }
    
    public function tags(){
        return $this->belongsToMany('App\Tag','user_tag');
    }
}
