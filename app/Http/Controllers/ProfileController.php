<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Follow;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(User $user) {
        $admin = Auth::user();
        
        $isfollowing = DB::table('follows')->where('following_id', $user->id AND 'follower_id', $admin->id)->count();
        $followers = DB::table('follows')->where('following_id', $user->id)->count();
        $following = DB::table('follows')->where('follower_id', $user->id)->count();
        if ($isfollowing) {
            $test=true;
        }
        else {
            $test=false;
        }
        if ($admin->id==$user->id) {
            $followers = DB::table('follows')->where('following_id', Auth::id())->count();
            $following = DB::table('follows')->where('follower_id', Auth::id())->count();
            return redirect('home')->with([
                'user' => $admin,
                'followers' => $followers,
                'following' => $following,
            ]);
        }
        else {
            return view('profile', [
                'admin' => $admin,
                'user' => $user,
                'test' => $test,
                'followers' => $followers,
                'following' => $following,
            ]);
        }
    }
    public function store(User $user) {
        $admin = Auth::user();
        $viewer = Auth::user();
        $data = request()->validate([
            'follower_id' => '',
            'following_id' => '',
        ]);
        if (!DB::table('follows')->where('following_id', $user->id AND 'follower_id', $admin->id)->count()) {
            $Follow = new Follow;
            $Follow->follower_id=$viewer->id;
            $Follow->following_id=$user->id;
            $Follow->save();
        }
        
        //dd($data);
        $isfollowing = DB::table('follows')->where('following_id', $user->id AND 'follower_id', $admin->id)->count();
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
    public function delete(User $user) {
        $admin = Auth::user();
        
        Follow::where('following_id', $user->id AND 'follower_id', $admin->id)->delete();
        
        $isfollowing = DB::table('follows')->where('following_id', $user->id AND 'follower_id', $admin->id)->count();
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
