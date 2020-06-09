<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function User() { // FK relationship
        return $this->belongsTo('App\User', 'User_ID');
    }
    public function Model() { // FK relationship
        return $this->belongsTo('App\Model', 'Model_ID');
    }
    public function Airline() { // FK relationship
        return $this->belongsTo('App\Airline', 'Airline_ID');
    }
    public function Airport() { // FK relationship
        return $this->belongsTo('App\Airport', 'Airport_ID');
    }
}
