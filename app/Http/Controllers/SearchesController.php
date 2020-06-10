<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vote;
use DB;

class SearchesController extends Controller
{
    public function index() {
        return view('search');
    }

    public function posts() {

        $votes = Vote::groupBy('image_id')->selectRaw('sum(value) as sum, image_id')->pluck('sum', 'image_id');
        
        $middle = DB::table('images')->joinSub('$votes', 'votes',function($join) {
            $join->on('votes.image_id', '=', 'images.id');
        });

        $plane = DB::table('planes')->joinSub('$middle', 'middle', function($join) {
            $join->on('planes.id', '=', 'middle.plane_id');
        });

        $airport = DB::table('airports')->joinSub('$plane', 'plane', function($join) {
            $join->on('airport.id', '=', 'plane.airport_id');
        });

        $final = DB::table('airlines')->joinSub('$airport', 'air', function($join) {
            $join->on('airline.id', '=' ,'air.airline_id');
        })->toSql();

        $final = DB::table('airlines')->where('airlines.id', '=', 'final.airline_id')->fromRaw('$final as final')->get();

        dd($final);

        return view('search', [
            'results' => $final,
        ]);
    }

    public function users() {
        $users = DB::table('users')->where('username', request('username'))->get()->flatten();
        return view('search', [
            'users' => $users,
        ]);
    }
}
