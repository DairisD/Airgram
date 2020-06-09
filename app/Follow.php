<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public function follower() {
        return $this->belongsTo('App/User', 'id', 'follower_id');
    }

    public function following() {
        return $this->belongsTo('App/User', 'id', 'following_id');
    }
}
