<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use Redirect;
use DB;

class VotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inc($user, $image) {
        $votes = DB::select("select * from votes where user_id = '$user' and image_id = '$image'");

        if($votes) {
            if($votes[0]->val == 1) {
                $deletable = Vote::find($votes[0]->id);
                $deletable->delete();
                return Redirect::back();
            }
            else if($votes[0]->val == -1) {
                $deletable = Vote::find($votes[0]->id);
                $deletable->delete();
                $insertable = new Vote;
                $insertable->user_id = $user;
                $insertable->image_id = $image;
                $insertable->val = 1;
                $insertable->save();
                return Redirect::back();
            }
        }
        else {
            $creatable = new Vote;
            $creatable->user_id = $user;
            $creatable->image_id = $image;
            $creatable->val = 1;
            $creatable->save(); 
            return Redirect::back();
        }
    }

    public function dec($user, $image) {
        $votes = DB::select("select * from votes where user_id = '$user' and image_id = '$image'");

        if($votes) {
            if($votes[0]->val == -1) {
                $deletable = Vote::find($votes[0]->id);
                $deletable->delete();
                return Redirect::back();
            }
            else if($votes[0]->val == 1) {
                $deletable = Vote::find($votes[0]->id);
                $deletable->delete();
                $insertable = new Vote;
                $insertable->user_id = $user;
                $insertable->image_id = $image;
                $insertable->val = -1;
                $insertable->save();
                return Redirect::back();
            }
        }
        else {
            $creatable = new Vote;
            $creatable->user_id = $user;
            $creatable->image_id = $image;
            $creatable->val = -1;
            $creatable->save(); 
            return Redirect::back();
        }
    }
}
