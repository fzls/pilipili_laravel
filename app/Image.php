<?php

namespace Pilipili;


/**
 * Class Image
 *
 * @package App
 */
class Image extends \Eloquent
{
    public function comments(){
        return $this->hasMany('Pilipili\Comment');
    }

    public function visited_users(){
        return $this->belongsToMany('Pilipili\User','click_image_events');
    }

    public function rated_users(){
        return $this->belongsToMany('Pilipili\User','rate_image_events');
    }

    public function visits_after($time)
    {
        return $this->visits()->where('created_at', '>=', $time);
    }

    public function visits(){
        return $this->hasMany('Pilipili\ClickImageEvent');
    }

    public function rates_after($time)
    {
        return $this->rates()->where('created_at', '>=', $time);
    }

    public function rates(){
        return $this->hasMany('Pilipili\RateImageEvent');
    }

    public function author(){
        return $this->belongsTo('Pilipili\User','author_id');
    }

    public function category(){
        return $this->belongsTo('Pilipili\ImageCategory','category_id');
    }

    public function tags(){
        return $this->belongsToMany('Pilipili\Tag','image_tag');
    }
}
