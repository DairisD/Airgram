<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment', 'user_id', 'image_id'];
    protected $primaryKey = 'id';

    public function user() { // FK relationship
        return $this->belongsTo('App\User', 'user_id');
    }
    public function image() { // FK relationship
        return $this->belongsTo('App\Image','image_id');
    }
}
