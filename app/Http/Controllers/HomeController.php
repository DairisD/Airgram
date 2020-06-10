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

        $followers = DB::table('follows')->where('following_id', Auth::id())->count();
        $following = DB::table('follows')->where('follower_id', Auth::id())->count();

        return view('home', [
            'user' => $user,
            'followers' => $followers,
            'following' => $following,
        ]);
    }
}
