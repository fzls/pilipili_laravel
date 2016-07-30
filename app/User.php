<?php

namespace Pilipili;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pilipili_id', 'email', 'password', 'avatar_filepath', 'custom_background_image_filepath', 'role',
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
        return $this->hasMany('Pilipili\Comment');
    }
    
    public function visited_images(){
        return $this->belongsToMany('Pilipili\Image','click_image_events');
    }
    
    public function rated_images(){
        return $this->belongsToMany('Pilipili\Image','rate_image_events');
    }
    
    public function visits(){
        return $this->hasMany('Pilipili\ClickImageEvent');
    }
    
    public function rates(){
        return $this->hasMany('Pilipili\RateImageEvent');
    }
    
    public function works(){
        return $this->hasMany('Pilipili\Image','author_id');
    }
    
    public function followings(){
        return $this->belongsToMany('Pilipili\User','follows','follower_id','followee_id');
    }
    
    public function followers(){
        return $this->belongsToMany('Pilipili\User','follows','followee_id','follower_id');
    }
    
    public function tags(){
        return $this->belongsToMany('Pilipili\Tag','user_tag');
    }
}
