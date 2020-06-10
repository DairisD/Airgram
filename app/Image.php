<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['plane_id', 'airline_id', 'user_id', 'airport_id', 'image'];

    public function user() { // FK relationship
        return $this->belongsTo('App\User', 'user_id');
    }
    public function plane() {
        return $this->belongsTo('App\Plane', 'plane_id');
    }
    public function airline() { // FK relationship
        return $this->belongsTo('App\Airline', 'airline_id');
    }
    public function airport() { // FK relationship
        return $this->belongsTo('App\Airport', 'airport_id');
    }
}
