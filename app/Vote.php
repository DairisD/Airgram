<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function User() { // FK relationship
        return $this->belongsTo('App\User');
    }
    public function Image() { // FK relationship
        return $this->belongsTo('App\Image');
    }
}
