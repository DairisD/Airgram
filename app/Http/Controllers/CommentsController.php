<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index($id) {

        $post_id = $id;

        $comments = DB::select('')

        return view('comments');
    }
}
