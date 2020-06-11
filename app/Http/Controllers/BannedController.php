<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class BannedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $admin = Auth::user();
        if ($admin->role!=1) {
            return redirect()->route('home');
        }
        $results = DB::table('users')->where('role', 2)->get();
        return view ('banned', [
            'bannedusers'=>$results,
        ]);
    }
    public function search () {
        $data = request()->validate([
            'name' => '',
        ]);
        $results = DB::table('users')->where('role', 2)->where('name', $data['name'])->get();
        if($data['name']==NULL) {
            $results = DB::table('users')->where('role', 2)->get();
        }
        return view ('banned', [
            'bannedusers'=>$results,
        ]);
    }
    public function edit(User $user) {
        $data = request()->validate([
            'id' => '',
            'role' => '',
        ]);
        $id = $data['id'];
        $data['role']=0;
        DB::table('users')->where('id',$id)->update($data);
        return redirect()->route('banned');
    }
}
