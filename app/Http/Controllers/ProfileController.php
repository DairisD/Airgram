<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Follow;
use App\Image;
use App\Block;
use Redirect;

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
        join (select images.image, images.user_id, images.plane_id, images.airline_id, images.airport_id, images.id as image_id, images.created_at as created_at, s.summa from images left join (select image_id, sum(val) as summa FROM votes group by (image_id)) as s on images.id = s.image_id) as imageq
        on users.id = imageq.user_id) as userq
        on airports.id = userq.airport_id) as airportq
        on airportq.plane_id = planes.id) as planeq
        on airlines.id = planeq.airline_id) as final
        where(user_id = '$user->id')
        order by created_at DESC"
        );

        $admin = Auth::user();
        
        $isfollowing = DB::table('follows')->where('follower_id', $admin->id)->where('following_id', $user->id)->count();
        $followers = DB::table('follows')->where('following_id', $user->id)->count();
        $following = DB::table('follows')->where('follower_id', $user->id)->count();
        if ($isfollowing) {
            $test1=true;
        }
        else {
            $test1=false;
        }
        $isblocker = DB::table('blocked')->where('blocker_id', $admin->id)->where('blocked_id', $user->id)->count();
        if ($isblocker) {
            $test2=true;
        }
        else {
            $test2=false;
        }
        $isblocked = DB::table('blocked')->where('blocker_id', $user->id)->where('blocked_id', $admin->id)->count();
        if ($isblocked) {
            $test3=true;
        }
        else {
            $test3=false;
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
                'test' => $test1,
                'blocker' => $test2,
                'blocked' => $test3,
                'followers' => $followers,
                'following' => $following,
                'posts' => $results,
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
            return redirect()->route('profile',['user'=> $user->id]);
        }
        
        else if ($check['button']==2) {
            $viewer= Auth::user();
            if ($user->role==0) {
                $data = request()->validate([
                'role' => '',
                ]);
                $data['role']=2;
                DB::table('users')->where('id',$user->id)->update($data);
                
            }
            elseif ($user->role==2) {
                $data = request()->validate([
                'role' => '',
                ]);
                $data['role']=0;
                DB::table('users')->where('id',$user->id)->update($data);
            }
            return redirect()->route('profile',['user'=> $user->id]);
        }
        else if ($check['button']==3) {
            $data = request()->validate([
                'blocker_id' => '',
                'blocked_id' => '',
            ]);
            $viewer = Auth::user();
            Follow::where('follower_id', $viewer->id)->where('following_id', $user->id)->delete();
            if (DB::table('blocked')->where('blocker_id', $viewer->id)->where('blocked_id', $user->id)->count() == 0) {
                DB::insert('insert into blocked (blocker_id, blocked_id) values (?,?)',[$viewer->id, $user->id]);
            }
            return redirect()->route('profile',['user'=> $user->id]);
        }
        else {
            return redirect()->route('home');
        }
    }
    public function delete(User $user) {
        $admin = Auth::user();
        $check = request()->validate([
            'button'=>['required'],
        ]);
        if ($check['button']==1) {
            Follow::where('follower_id', $admin->id)->where('following_id', $user->id)->delete();
            return redirect()->route('profile',['user'=> $user->id]);

        }
        else if ($check['button']==3) {
            DB::table('blocked')->where('blocker_id', $admin->id)->where('blocked_id', $user->id)->delete();
            return redirect()->route('profile',['user'=> $user->id]);
        }
        else {
            return redirect()->route('home');
        }
    }

    public function remove($user, $image) {
        $post = $image;

        $deleteable = Image::find($post);
        $deleteable->delete();

        return Redirect::to('/profile/'.$user);
    }
}
