<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user() { // FK relationship
        return $this->belongsTo('App\User', 'id', 'user_ID');
    }
    public function image() { // FK relationship
        return $this->belongsTo('App\Image', 'id', 'image_ID');
    }
}
