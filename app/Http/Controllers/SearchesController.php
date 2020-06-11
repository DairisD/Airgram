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

        $query = DB::select('select planeq.*, airline_name from airlines
        right join (select airportq.*, plane_name from planes
        right join (select userq.*, airports.airport_name from airports
        right join (select imageq.*, username, profile_picture from users
        join (select * from images left join (select image_id, sum(val) as summa FROM votes group by image_id) as s on images.id = s.image_id) as imageq
        on users.id = imageq.user_id) as userq
        on airports.id = userq.airport_id) as airportq
        on airportq.plane_id = planes.id) as planeq
        on airlines.id = planeq.airline_id');

        $plane = request('plane');
        $airport = request('airport');
        $airline = request('airline');

        $results = DB::table($query);
        dd($results);


        $user = auth()->user();


        return view('search', [
            'results' => $results,
            'user' => $user,
        ]);
    }

    public function users() {

        $data = request()->validate([
            'username' => 'required',
        ]);

        $users = DB::table('users')->where('username', $data['username'])->get()->flatten();
        return view('search', [
            'users' => $users,
        ]);
    }
}
