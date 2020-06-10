<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $fillable = ['name'];

    public function image() {
        return $this->hasMany('App\Image');
    }

    public $timestamps = false;
}
