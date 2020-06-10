<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchesController extends Controller
{
    public function index() {
        return view('search');
    }

    public function show() {
        $data = request()->all();

        dd($data);
    }
}
