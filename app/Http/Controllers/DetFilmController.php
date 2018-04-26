<?php

namespace App\Http\Controllers;

use App\Film;
use App\Tayang;
use App\ListKursi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($film_id)
    {
        //$query = $request->get('film_id');
        $hasil = Film::where('id_film', $film_id)->get();
        $tayang = Tayang::where('id_film', $film_id)->get();
        //dd($hasil->all());
        return view('film.index',compact('hasil','tayang'));
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function kursi()
    {
            $id = $_GET['id'];
            $hasil = ListKursi::where('id_tayang', $id)->get();
            //dd($data->all());

            return $hasil;
        
        
    }
}
