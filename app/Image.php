<?php

namespace App;


/**
 * Class Image
 *
 * @package App
 */
class Image extends \Eloquent
{
    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function visited_users(){
        return $this->belongsToMany('App\User','click_image_events');
    }

    public function rated_users(){
        return $this->belongsToMany('App\User','rate_image_events');
    }

    public function visits_after($time)
    {
        return $this->visits()->where('created_at', '>=', $time);
    }

    public function visits(){
        return $this->hasMany('App\ClickImageEvent');
    }

    public function rates_after($time)
    {
        return $this->rates()->where('created_at', '>=', $time);
    }

    public function rates(){
        return $this->hasMany('App\RateImageEvent');
    }

    public function author(){
        return $this->belongsTo('App\User','author_id');
    }

    public function category(){
        return $this->belongsTo('App\ImageCategory','category_id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag','image_tag');
    }
}
