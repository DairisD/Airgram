<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = ['airport_name'];

    public function image() { // FK relationship
        return $this->hasMany('App\Image');
    }

    public $timestamps = false;
}
