<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role==2) {
            $message = 'Your account has been suspended. Please contact administrator.';
            auth()->logout();
            return redirect()->route('login')->withMessage($message);
        }
        $followers = DB::table('follows')->where('following_id', Auth::id())->count();
        $following = DB::table('follows')->where('follower_id', Auth::id())->count();

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

        return view('home', [
            'posts' => $results,
            'user' => $user,
            'followers' => $followers,
            'following' => $following,
        ]);
    }
}
