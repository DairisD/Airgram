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
       
        $data = request()->validate([
            'image' => ['required', 'image'],
        ]);

        auth()->user()->image()->store($data);

        request('image')->store('post_images', 'public');
    }
}
