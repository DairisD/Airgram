<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class BlockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $viewer = Auth::user();
        $results = DB::select('select * from blocked, users where blocker_id = :viewer AND users.id=blocked_id',['viewer'=>$viewer->id]);
        return view ('blocked', [
            'blockedusers'=>$results,
        ]); 
    }
    public function edit(User $user) {
        $viewer = Auth::user();
        $data = request()->validate([
            'id' => '',
        ]);
        DB::table('blocked')->where('blocker_id', $viewer->id)->where('blocked_id', $data['id'])->delete();
        //dd(DB::table('blocked')->where('blocker_id', $viewer->id)->where('blocked_id', $data['id']));
        return redirect()->route('blocked');
    }
    public function search() {
        $data = request()->validate([
            'name' => '',
        ]);
        $viewer = Auth::user();
        $results = DB::select('select * from blocked, users '
                . 'where blocker_id = :viewer AND users.id=blocked_id AND users.name= :vards' 
                ,['viewer'=>$viewer->id,'vards'=>$data['name']]);
        //dd($results->name);
        if($data['name']==NULL) {
            $results = DB::select('select * from blocked, users where blocker_id =:viewer AND users.id=blocked_id',['viewer'=>$viewer->id]);
        }
        return view ('blocked', [
            'blockedusers'=>$results,
        ]);
    }
}
