<?php

namespace Pilipili;

use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{
    public function images(){
        return $this->hasMany('Pilipili\Image','category_id');
    }
}
