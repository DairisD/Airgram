<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FollowersController extends Controller
{
    public function index($user) {
        $followers = DB::select("select * from users join (select * from follows where following_id = '$user') as s on(users.id = s.follower_id)");

        $count = DB::select("select * from (select following_id, count(*) as ct from follows group by(following_id)) as temp where following_id = '$user'");

        return view('followers', [
            'followers' => $followers,
            'count' => $count,
        ]);
    }
}
