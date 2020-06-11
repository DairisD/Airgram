<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user) {
        $admin = Auth::user();
        
        $isfollowing = DB::table('follows')->where('follower_id', $user->id == 'following_id', $admin->id)->count();
        $followers = DB::table('follows')->where('following_id', $user->id)->count();
        $following = DB::table('follows')->where('follower_id', $user->id)->count();
        if ($isfollowing) {
            $test=true;
        }
        else {
            $test=false;
        }
        return view('profile', [
            'admin' => $admin,
            'user' => $user,
            'test' => $test,
            'followers' => $followers,
            'following' => $following,
        ]);
    }
}
