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

    public function kirimData(Request $request)
    {
		return $this->getBooking($request);
    }

    public function getBooking($request)
    {

    	$id = $request->get('id_user');
    	$book = Booking::where('id_user', $id)
    			->where('status','belum_lunas')
    			->select('id_booking','id_user','status')
    			->first();

    	return $this->detBooking($book, $request);
    }

    public function detBooking($book, $request)
    {
    	$id = $request->get('id_user');
        
        //(date('Y-m-d', strtotime("+1 day")));

    	if (empty($book->id_booking)) {
    		$booking = Booking::create($request->except('id_list_kursi'));

    		$detBooking = DetBooking::create([
			        'id_booking' => $booking->id_booking,
			        'harga' => $request->get('harga_tiket'),
			        'id_list_kursi' => $request->get('id_list_kursi')
			]);
    	} elseif ($book->id_user == $id && $book->status == 'belum_lunas') {
    		$detBooking = DetBooking::create([
			        'id_booking' => $book->id_booking,
			        'harga' => $request->get('harga_tiket'),
			        'id_list_kursi' => $request->get('id_list_kursi')
			]);
    	} else {
    		$booking = Booking::create($request->except('id_list_kursi'));

    		$detBooking = DetBooking::create([
			        'id_booking' => $booking->id_booking,
			        'harga' => $request->get('harga_tiket'),
			        'id_list_kursi' => $request->get('id_list_kursi')
			]);
		}
    	
		return $this->checkOut($request);
    }

    public function checkOut($request)
    {
    	$id = $request->get('id_user');

    	$hasil = Booking::join('tb_det_booking', 'tb_det_booking.id_booking','=','tb_booking.id_booking')
    		->leftJoin('tb_list_kursi','tb_det_booking.id_list_kursi','=','tb_list_kursi.id_list_kursi')
    		->leftJoin('tb_tayang','tb_list_kursi.id_tayang','=','tb_tayang.id_tayang')
    		->leftJoin('tb_film','tb_tayang.id_film','=','tb_film.id_film')
    		->WHERE('tb_booking.id_user',$id)
    		->where('tb_booking.status','belum_lunas')
    		->select('nama_film','harga','tb_booking.id_booking')
        	->get();

        //dd($hasil->all());

        return view('transaksi.checkout',compact('hasil'));
    }

    public function check($user_id)
    {
    	$hasil = Booking::join('tb_det_booking', 'tb_det_booking.id_booking','=','tb_booking.id_booking')
    		->leftJoin('tb_list_kursi','tb_det_booking.id_list_kursi','=','tb_list_kursi.id_list_kursi')
    		->leftJoin('tb_tayang','tb_list_kursi.id_tayang','=','tb_tayang.id_tayang')
    		->leftJoin('tb_film','tb_tayang.id_film','=','tb_film.id_film')
    		->WHERE('tb_booking.id_user',$user_id)
    		->where('tb_booking.status','belum_lunas')
    		->select('nama_film','harga','tb_booking.id_booking')
        	->get();

        //dd($hasil->all());

        return view('transaksi.checkout',compact('hasil'));
    }
}
