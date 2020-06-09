<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function user() { // FK relationship
        return $this->belongsTo('App\User', 'user_ID');
    }
    public function plane() {
        return $this->belongsTo('App\Plane', 'plane_ID');
    }
    public function airline() { // FK relationship
        return $this->belongsTo('App\Airline', 'airline_ID');
    }
    public function airport() { // FK relationship
        return $this->belongsTo('App\Airport', 'airport_ID');
    }
}
