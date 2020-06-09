<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function User() { // FK relationship
        return $this->belongsTo('App\User', 'User_ID');
    }
    public function Image() { // FK relationship
        return $this->belongsTo('App\Image','Image_ID');
    }
}
