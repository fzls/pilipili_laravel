<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function image(){
        return $this->belongsTo('App\Image');
    }

    public function reply_to(){
        return $this->belongsTo('App\Comment','reply_to_comment_id');
    }
}
