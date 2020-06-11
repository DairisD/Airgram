<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Comment;

class CommentsController extends Controller
{
    public function index($id) {

        $post_id = $id;

        $comments = DB::select("select sel.*, username, profile_picture from users
        join (Select * from comments where image_id = '$id') as sel
        on users.id = sel.user_id");

        return view('comments', [
            'id' => $id,
            'comments' => $comments,
        ]);
    }

    public function create($id) {

        //dd($reqeust->all());

        $text = request()->validate([
            'comment' => ['required', 'max:200']
        ]);

        $user = Auth::user();

        $comment = new Comment;
        $comment->user_id = $user->id;
        $comment->image_id = $id;
        $comment->comment = $text;

        $comment->save();

        dd($comment);

        return redirect('/comments/{{$id}}');

    }
}
