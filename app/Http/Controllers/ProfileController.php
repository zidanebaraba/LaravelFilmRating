<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;

class ProfileController extends Controller
{
    public function index(){
        $profile = Profile::where('user_id', Auth::id())->first();

        return view('profile.index', compact('profile'));
    }

    public function update(request $request, $id){
        $request->validate([
            'umur' => 'required',
            'bio' => 'required',
            'alamat' => 'required',
        ]);

        $profile = Profile::find($id);

        $profile->umur = $request['umur'];
        $profile->bio = $request['bio'];
        $profile->alamat = $request['alamat'];

        $profile->save();

        return redirect('/profile');

    }
}
