<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function User() { // FK relationship
        return $this->belongsTo('App\User', 'user_ID');
    }
    public function Model() { // FK relationship
        return $this->belongsTo('App\Model', 'model_ID');
    }
    public function Airline() { // FK relationship
        return $this->belongsTo('App\Airline', 'airline_ID');
    }
    public function Airport() { // FK relationship
        return $this->belongsTo('App\Airport', 'airport_ID');
    }
}
