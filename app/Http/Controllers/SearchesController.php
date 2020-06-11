<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vote;
use App\Plane;
use App\Image;
use App\Airport;
use App\Airline;
use DB;

class SearchesController extends Controller
{
    public function index() {
        return view('search');
    }

    public function posts() {

        //$votes = Vote::groupBy('image_id')->selectRaw('sum(val) as summa, image_id')->pluck('summa', 'image_id');

        //$votes = DB::table('votes')->selectRaw(' *, sum() as sum from votes group by id');
//
        //$middle = DB::table('images')->join(DB::raw('*, sum(value) as sum from votes group by id'), function($join) {
        //    $join->on('votes.image_id', '=', 'images.id');
        //})->toSql();


        //$middle = DB::table('images')->joinSub($votes, 'votes',function($join) {
        //    $join->on('votes.image_id', '=', 'images.id');
        //});

        $query = DB::select('select userq.*, plane_name, airport_name, airline_name from planes, airports, airlines,
        (select imageq.*, username, profile_picture from users,
        (select s.*, user_id, plane_id, airline_id, airport_id, image from images,
        (SELECT image_id, sum(val) as summa FROM votes group by image_id) as s
        where(images.id = s.image_id)) as imageq
        where(users.id = imageq.user_id)) as userq
        where(userq.plane_id = planes.id and userq.airport_id = airports.id and userq.airline_id = airlines.id)');

        //$users = DB::table('users')->joinSub('$middle', 'middle', function($join) {
        //    $join->on('middle.user_id', '=', 'users.id');
        //});
//
        //$plane = DB::table('planes')->joinSub('$users', 'user', function($join) {
        //    $join->on('planes.id', '=', 'user.plane_id');
        //});
//
        //$airport = DB::table('airports')->joinSub('$plane', 'plane', function($join) {
        //    $join->on('airport.id', '=', 'plane.airport_id');
        //});
//
        //$final = DB::table('airlines')->joinSub('$airport', 'air', function($join) {
        //    $join->on('airline.id', '=' ,'air.airline_id');
        //})->get();

        $user = auth()->user();

        return view('search', [
            'results' => $query,
            'user' => $user,
        ]);
    }

    public function users() {
        $users = DB::table('users')->where('username', request('username'))->get()->flatten();
        return view('search', [
            'users' => $users,
        ]);
    }
}
