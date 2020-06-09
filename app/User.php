<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'profile_picture', 'user_role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo('App/Role');
    }

    public function follow() {
        return $this->hasMany('App/Follow');
    }

    public function block() {
        return $this->hasMany('App/Block');
    }

    public function vote() {
        return $this->hasMany('App/Vote');
    }

    public function comment() {
        return $this->hasMany('App/Comment');
    }

    public function image() {
        return $this->hasMany('App/Image');
    }
}
