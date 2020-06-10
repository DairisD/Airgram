<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class SearchesController extends Controller
{
    public function index() {
        return view('search');
    }

    public function posts() {
        $votes = DB::table('votes')->select('user_id')->sum('votes')->groupBy('votes');
        return view('search', [
            'search' => $search,
            'data' => $data,
        ]);
    }

    public function users() {
        $users = DB::table('users')->where('username', request('username'))->get()->flatten();
        return view('search', [
            'users' => $users,
        ]);
    }
}
