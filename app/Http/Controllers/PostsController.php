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

    public function store(Request $request) {
       
        $data = request()->validate([
            'image' => ['required', 'image'],
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $imagePath=$image->move(public_path('post_images'), $imageName);
        $image ="/post_images/".$imageName;

        $plane = new Plane;
        $airline = new Airline;
        $airport = new Airport;
    
        if(request('plane')) {
            $plane = Plane::firstOrNew(['plane_name' => request('plane')]);
            $plane->save();
        }
        if(request('airport')) {
            $airport = Airport::firstOrNew(['airport_name' => request('airport')]);
            $airport->save();
        }
        if(request('airline')) {
            $airline = Airline::firstOrNew(['airline_name' => request('airline')]);
            $airline->save();
        } 
        
        
        $temp['image'] = $image;
        $temp['plane_id'] = $plane->id;
        $temp['airport_id'] = $airport->id;
        $temp['airline_id'] = $airline->id;

        auth()->user()->image()->create($temp);

        return redirect('home');
    }
}
