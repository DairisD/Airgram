<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FollowingController extends Controller
{
    public function index($user) {
        $following = DB::select("select * from users join (select * from follows where follower_id = '$user') as s on(users.id = s.following_id)");

        $count = DB::select("select * from (select follower_id, count(*) as ct from follows group by(follower_id)) as temp where follower_id = '$user'");

        return view('following', [
            'following' => $following,
            'count' => $count,
        ]);
    }
}
