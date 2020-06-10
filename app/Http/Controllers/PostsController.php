<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plane;
use App\Airline;
use App\Airport;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('post');
    }

    public function store() {
       
        $data = request()->validate([
            'image' => ['required', 'image'],
        ]);

        request('image')->store('post_images', 'public');

        $plane = new Plane;
        $airline = new Airline;
        $airport = new Airport;
    
        if(request('plane')) {
            $plane = Plane::firstOrNew(['name' => request('plane')]);
            $plane->save();
        }
        if(request('airport')) {
            $airport = Airport::firstOrNew(['name' => request('airport')]);
            $airport->save();
        }
        if(request('airline')) {
            $airline = Airline::firstOrNew(['name' => request('airline')]);
            $airline->save();
        } 
        
        
        $temp['image'] = $data['image'];
        $temp['plane_id'] = $plane->id;
        $temp['airport_id'] = $airport->id;
        $temp['airline_id'] = $airline->id;

        auth()->user()->image()->create($temp);

        return redirect('home');
    }
}
