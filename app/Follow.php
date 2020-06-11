<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Follow extends Model
{
    protected $fillable = ['follower_id', 'following_id'];
    
    public function follower() {
        return $this->belongsTo('App/User', 'id', 'follower_id');
    }

    public function following() {
        return $this->belongsTo('App/User', 'id', 'following_id');
    }
}
