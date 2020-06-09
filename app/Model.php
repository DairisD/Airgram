<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model extends Model
{
    public function Image() { // FK relationship
        return $this->hasMany('App\Image');
    }
}
