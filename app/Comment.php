<?php

namespace Pilipili;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user(){
        return $this->belongsTo('Pilipili\User');
    }

    public function image(){
        return $this->belongsTo('Pilipili\Image');
    }

    public function reply_to(){
        return $this->belongsTo('Pilipili\Comment','reply_to_comment_id');
    }
}
