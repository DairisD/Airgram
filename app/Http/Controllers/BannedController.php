<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class BannedController extends Controller
{
    public function edit(User $user) {
        $admin= Auth::user();
        $data = request()->validate([
            'role'=>['required'],
        ]);
        if ($user->role==0) {
            $data['role']=1;
            $user->role->update($data);
        }
        else {
            $data['role']=0;
            $user->role->update($data);
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
