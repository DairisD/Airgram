<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Comment;
use Redirect;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id) {

        $post_id = $id;
        $user = Auth::user();
        $comments = DB::select("select sel.*, username, profile_picture from users
        join (Select * from comments where image_id = '$id') as sel
        on users.id = sel.user_id");

        return view('comments', [
            'id' => $post_id,
            'results' => $comments,
            'user' => $user,
        ]);
    }

    public function create($id) {

        $text = request()->validate([
            'message' => ['required', 'max:200']
        ]);

        $user = Auth::user();
        
        $comment = $text['message'];

        DB::insert("insert into comments (user_id, image_id, comment) values ('$user->id', '$id', '$comment')");

        return Redirect::to('/comments/'.$id);
    }

    public function delete($post, $id) {
        $comment = $id;

        $deleteable = Comment::find($id);
        $deleteable->delete();

        return Redirect::to('/comments/'.$post);
    }
}
