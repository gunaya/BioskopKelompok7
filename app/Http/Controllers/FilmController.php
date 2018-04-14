<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use \App\Film;
use \File;
use \Storage;
use \App\tb_genre_film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listFilm = Film::all();
        return view('admin-film.index',compact('listFilm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $filename = $image->getClientOriginalName();
        $image->move('upload\images', $filename, file_get_contents($request->file('image')->getRealPath()));

        $film = new Film;

        $film -> nama_film = $request->get('nama_film');
        $film->tahun_produksi = $request->get('tahun_produksi');
        $film->direksi = $request->get('direksi');
        $film->pemain = $request->get('pemain');
        $film->sinopsis = $request->get('sinopsis');
        $film->bahasa = $request->get('bahasa');
        $film->image = $filename;
        $film->id_genre_film = $request->get('id_genre_film');
        $film->id_kategori = $request->get('id_kategori');
        $film->save();
//['nama_film','tahun_produksi','direksi','pemain','sinopsis','bahasa','negara','id_genre_film','id_kategori'];
        //Film::create($request->all());
        //dd($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $film_id = Film::FindOrFail($request->id_film);
        $film_id->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $film_id = Film::FindOrFail($request->id_film);
        $film_id->delete();
        return back();
    }

    public function show_film()
    {
        $film = Film::all();
        return view('/user_home',compact('film'));
    }
}
