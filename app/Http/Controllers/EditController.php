<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EditController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function edit(User $user) {
        return view ('edit', compact('user'));
    }
    public function update(User $user) {
        $data = request()->validate([
            'name'=>['required'],
            'profile_picture'=>[''],
        ]);
        if (request('profile_picture')) {
            $imageName = time().'.'.$data['profile_picture']->extension();
            $imagePath=$data['profile_picture']->move(public_path('storage/app/public/user_images'), $imageName);
            $data['profile_picture']='storage/app/public/user_images/'.$imageName;
        }
        //dd($imagePath);
        auth()->user()->update($data);
        return redirect('home');
    }
}
