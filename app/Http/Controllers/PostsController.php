<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('post');
    }

    public function store() {
       
        $image = request()->validate([
            'image' => ['required', 'image'],
        ]);

        $plane = Plane::firstOrNew(['plane' => request('plane')]);
        $airport = Airport::firstOrNew(['airport' => request('airport')]);
        $airline = Airline::firstOrNew(['airline' => request('airline')]);

        $data->plane = $plane->id;
        $data->airport = $airport->id;
        $data->airline = $airline->id;

        auth()->user()->image()->create($data);

        request('image')->store('post_images', 'public');
    }
}
