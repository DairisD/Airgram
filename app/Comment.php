<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user() { // FK relationship
        return $this->belongsTo('App\User', 'user_ID');
    }
    public function image() { // FK relationship
        return $this->belongsTo('App\Image','image_ID');
    }
}