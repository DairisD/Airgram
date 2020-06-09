<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function user() { // FK relationship
        return $this->belongsTo('App\User');
    }
    public function image() { // FK relationship
        return $this->belongsTo('App\Image');
    }
}