<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use Redirect;

class VotesController extends Controller
{
    public function inc($user, $image) {
        $votes = DB::select("select * from votes where user_id = '$user' and image_id = '$image'");
        if($votes) {
            if($votes->val == 1) {
                return Redirect::back();
            }
        }
    }
}
