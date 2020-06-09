<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    public function image() { // FK relationship
        return $this->hasMany('App\Image');
    }
}
