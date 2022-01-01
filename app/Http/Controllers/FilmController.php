<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Film;
use App\Kritik;
use File;

class FilmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);

        // $this->middleware('log')->only('index');

        // $this->middleware('subscribed')->except('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = Film::All();

        return view('film.index', compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = DB::table('genre')->get();
        return view('film.create',compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $film = new Film;

        $request->validate([
            'judul' => 'required',
            'poster' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $posterName = time().'.'.$request->poster->extension();
        $request->poster->move(public_path('gambar'), $posterName);

        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->poster = $posterName;
        $film->genre_id = $request->genre_id;
        $film->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::findOrFail($id);
        return view('film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = DB::table('genre')->get();
        $film = Film::findOrFail($id);

        return view('film.edit', compact('film','genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'poster' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $film = Film::find($id);

        if($request->has('poster')){

        $posterName = time().'.'.$request->poster->extension();
        $request->poster->move(public_path('gambar'), $posterName);

        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->poster = $posterName;
        $film->genre_id = $request->genre_id;
        }else{
        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->genre_id = $request->genre_id;
        }
        $film->update();
        return redirect('/film');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        $path = "gambar/";
        file::delete($path . $film->poster);

        $film->delete();
        return redirect('/film');
    }
}
