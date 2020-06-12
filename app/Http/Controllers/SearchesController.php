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
use Redirect;

class SearchesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('search');
    }

    public function posts() {

        $plane = request('plane');
        $airport = request('airport');
        $airline = request('airline');
        
        $results = DB::select("select * from (select planeq.*, airline_name from airlines
        right join (select airportq.*, plane_name from planes
        right join (select userq.*, airports.airport_name from airports
        right join (select imageq.*, id, username, profile_picture from users
        join (select images.image, images.user_id, images.plane_id, images.airline_id, images.airport_id, images.id as image_id, s.summa from images left join (select image_id, sum(val) as summa FROM votes group by (image_id)) as s on images.id = s.image_id) as imageq
        on users.id = imageq.user_id) as userq
        on airports.id = userq.airport_id) as airportq
        on airportq.plane_id = planes.id) as planeq
        on airlines.id = planeq.airline_id) as final
        where (plane_name = :plane or plane_name is null) and (airport_name = :airport or airport_name is null) and (airline_name = :airline or airline_name is null)"
        ,['plane' => $plane, 'airport' => $airport, 'airline' => $airline]);

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

        $users = DB::table('users')->where('username', $data['username'])->first();
        return view('search', [
            'this_user' =>auth()->user(),
            'users' => $users,
        ]);
    }

    public function delete($image) {
        $deleteable = Image::findOrFail($image);
        $deleteable->delete();

        return Redirect::back();
    }
}
