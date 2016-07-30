<?php

namespace Pilipili;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function users()
    {
        return $this->belongsToMany('Pilipili\User', 'user_tag');
    }

    public function most_viewed_image()
    {
        return $this->images()->orderBy('views', 'desc')->first();
    }

    public function images()
    {
        return $this->belongsToMany('Pilipili\Image', 'image_tag');
    }
}
