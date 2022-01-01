<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Kritik;

class KritikController extends Controller
{

    public function index(){

        $point = Kritik::avg('point');
    }
    public function store(request $request){
        $request->validate([
            'isi' => 'required',
            'point' => 'required',
        ]);

        $kritik = new Kritik;

        $kritik->isi = $request->isi;
        $kritik->point = $request->point;
        $kritik->user_id = Auth::id();
        $kritik->film_id = $request->film_id;
        $kritik->save();
        
        return redirect('/film');
    }
}
