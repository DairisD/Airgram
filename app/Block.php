<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    public function blocker() {
        return $this->belongsTo('App/User', 'id', 'blocker_id');
    }

    public function blocked() {
        return $this->belongsTo('App/User', 'id', 'blocked_id');
    }
}
