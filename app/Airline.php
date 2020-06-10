<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    public function image() {
        return $this->hasMany('App\Image');
    }
}
