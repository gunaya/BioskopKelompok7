<?php

namespace App\Http\Controllers;

use App\Booking;
use App\DetBooking;
use App\Transaksi;
use App\ListKursi;
use App\Tayang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index($list_id)
    {
    	$hasil = ListKursi::join('tb_tayang', 'tb_list_kursi.id_tayang', '=' , 'tb_tayang.id_tayang')
    		->leftJoin('tb_film','tb_tayang.id_film','=','tb_film.id_film')
    		->WHERE('id_list_kursi',$list_id)
    		->select('nama_film','waktu_tayang','harga_tiket','id_list_kursi')
        	->get();
    	return view('transaksi.index',compact('hasil'));
    }

    public function booking(Request $request)
    {
    	$booking = Booking::create($request->except('id_list_kursi'));

		$detBooking = DetBooking::create([
		        'id_booking' => $booking->id_booking,
		        'harga' => $request->get('harga_tiket'),
		        'id_list_kursi' => $request->get('id_list_kursi')
		]);

		$transaksi = Transaksi::create([
				'id_booking' => $booking->id_booking,
				'method' => $request->get('method'),
				'id_user' => $request->get('id_user')
		]);

		return view('transaksi.berhasil');
    }
}
