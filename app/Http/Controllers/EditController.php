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
            $imagePath=$data['profile_picture']->move(public_path('storage'), $imageName);
            //$imagePath = request('profile_picture')->store('user_images', 'public');
            $image = Image::make($imagePath)->fit(1000,1000);
            $image->save();
            array_merge($data, ['profile_picture'=>$imagePath]);
        }
        $data['profile_picture']=$imagePath;

        //dd($data['profile_picture']->move(public_path('storage'), $imageName));
        auth()->$user->profile_picture=$data['profile_picture'];
        dd($user->profile_picture);
        //dd($user->profile_picture);
        return redirect('home');
    }
}
