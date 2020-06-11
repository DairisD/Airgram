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

        $results = DB::select("select * from (select planeq.*, airline_name from airlines
        right join (select airportq.*, plane_name from planes
        right join (select userq.*, airports.airport_name from airports
        right join (select imageq.*, username, profile_picture from users
        join (select images.image, images.user_id, images.plane_id, images.airline_id, images.airport_id, images.id as image_id, s.summa from images left join (select image_id, sum(val) as summa FROM votes group by (image_id)) as s on images.id = s.image_id) as imageq
        on users.id = imageq.user_id) as userq
        on airports.id = userq.airport_id) as airportq
        on airportq.plane_id = planes.id) as planeq
        on airlines.id = planeq.airline_id) as final
        where(user_id = '$user->id')"
        );

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
                'posts' => $results,
            ]);
        }
    }
    public function store(User $user) {
        $admin = Auth::user();
        $viewer = Auth::user();
        $check = request()->validate([
            'button' =>'required',
        ]);
        if ($check['button']==1) {
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
            dd($admin->id, $user->id, DB::table('follows')->where('following_id', $user->id AND 'follower_id', $viewer->id)->count());
            dd(DB::table('follows')->where('following_id', $user->id AND 'follower_id', $viewer->id));
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
    public function delete(User $user) {
        $admin = Auth::user();
        $data = request()->validate([
            'button'=>['required'],
        ]);
        if ($data['button']==1) {
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
        else if ($data['button']==2) {
            
        }
        
    }
}
