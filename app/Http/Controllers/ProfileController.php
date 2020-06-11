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
        $viewer = Auth::user();
        $check = request()->validate([
            'button' =>'required',
        ]);
        if ($check['button']==1) {
            $data = request()->validate([
                'follower_id' => '',
                'following_id' => '',
            ]);
            if (DB::table('follows')->where('follower_id', $viewer->id)->where('following_id', $user->id)->count() == 0) {
                $Follow = new Follow;
                $Follow->follower_id=$viewer->id;
                $Follow->following_id=$user->id;
                $Follow->save();
            }
            $isfollowing = DB::table('follows')->where('follower_id', $viewer->id)->where('following_id', $user->id)->count();
            $followers = DB::table('follows')->where('following_id', $user->id)->count();
            $following = DB::table('follows')->where('follower_id', $user->id)->count();
            if ($isfollowing) {
                $test=true;
            }
            else {
                $test=false;
            }
            $admin = Auth::user();
            return view('profile', [
                    'admin' => $admin,
                    'user' => $user,
                    'test' => $test,
                    'followers' => $followers,
                    'following' => $following,
                ]);
        }
        
        else if ($check['button']==2) {
            $admin= Auth::user();
            if ($user->role==0) {
                $data = request()->validate([
                'role' => '',
                ]);
                $data['role']=1;
                DB::table('users')->where('id',$user->id)->update($data);
                
                //$user->role->update($data);
            }
            else {
                $data = request()->validate([
                'role' => '',
                ]);
                $data['role']=0;
                DB::table('users')->where('id',$user->id)->update($data);
                //$user->role->update($data);
            }
            $isfollowing = DB::table('follows')->where('follower_id', $admin->id AND 'following_id', $user->id)->count();
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
    public function delete(User $user) {
        $admin = Auth::user();
        $data = request()->validate([
            'button'=>['required'],
        ]);
        if ($data['button']==1) {
            Follow::where('follower_id', $admin->id)->where('following_id', $user->id)->delete();

            $isfollowing = DB::table('follows')->where('follower_id', $admin->id)->where('following_id', $user->id)->count();
            $followers = DB::table('follows')->where('following_id', $user->id)->count();
            $following = DB::table('follows')->where('follower_id', $user->id)->count();
            //dd(DB::table('follows')->where('follower_id', $admin->id AND 'following_id', $user->id)->count());
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
        else if ($data['button']==2) {
            
        }
        
    }
}
