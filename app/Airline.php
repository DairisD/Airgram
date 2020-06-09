<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    public function image() { // FK relationship
        return $this->hasMany('App\Image');
    }
}
