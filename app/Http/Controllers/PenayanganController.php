<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Film;
use App\Studio;
use App\Tayang;
use App\Kursi;
use App\ListKursi;

class PenayanganController extends Controller
{
    public function penayangan()
    {
    	$hasil = Tayang::join('tb_film','tb_tayang.id_film','=','tb_film.id_film')
    					->join('tb_studio','tb_tayang.id_film','=','tb_studio.id_studio')
    					->select('waktu_tayang','harga_tiket','nama_film','nama_studio','id_tayang')
    					->paginate(8);

    	$film = Film::all();
    	$studio = Studio::all();
    	$kursi = Kursi::all();


    	//dd($film->all());
    	return view('admin-film/penayangan/jadwal',compact('hasil','film','studio','kursi'));
    }
    public function simpan_jadwal(Request $request)
    {
    	//dd($request->all());
    	Tayang::create($request->all());
    	return back();
    }

    public function simpan_list(Request $request)
    {
    	//dd($request->all());
    	ListKursi::create($request->all());
    	return back();
    }

    public function kursi()
    {
    	$hasil = Kursi::paginate(10);
    	return view('admin-film/penayangan/kursi',compact('hasil'));
    }
    public function simpan_kursi(Request $request)
    {
    	//dd($request->all());
    	Kursi::create($request->all());
    	return back();
    }


    public function list_kursi($id_tayang)
    {
    	$hasil = ListKursi::join('tb_kursi','tb_list_kursi.id_kursi','=','tb_kursi.id_kursi')
    					->join('tb_tayang','tb_list_kursi.id_tayang','=','tb_tayang.id_tayang')
    					->where('tb_list_kursi.id_tayang', $id_tayang)
    					->select('id_list_kursi','kode_kursi','waktu_tayang','status')
    					->paginate(10);
    	//dd($hasil->all());	
    	$kursi = Kursi::all();
    	$tayang = Tayang::all();
    	return view('admin-film/penayangan/list',compact('hasil','kursi','tayang'));
    }

    public function lihat_studio()
    {
        $hasil = Studio::paginate(7);
        return view('admin-film/penayangan/studio',compact('hasil'));
    }

    public function simpan_studio(Request $request)
    {
        Studio::create($request->all());
        return back();
    }
}
