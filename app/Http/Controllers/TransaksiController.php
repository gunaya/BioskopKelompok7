<?php

namespace App\Http\Controllers;

use App\Booking;
use App\DetBooking;
use App\Transaksi;
use App\ListKursi;
use App\Tayang;
use DateTime;
use DateTimeZone;
use DateInterval;
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
    			->select('id_booking','id_user','status','batas_transaksi','total_pembayaran')
    			->first();

        if (empty($book->id_booking)) {
            $id_book = 0;
        } else {
            $id_book = $book->id_booking;
        }
        $detbook = DetBooking::where('id_booking', $id_book)
                ->select('harga')
                ->orderBy('created_at','desc')
                ->first();

    	return $this->detBooking($book, $detbook, $request);
    }

    public function detBooking($book, $detbook, $request)
    {
    	$id = $request->get('id_user');
        
        //set waktu
        $date = new DateTime();
        $date->setTimeZone(new DateTimeZone('Asia/Hong_Kong'));

        $date_now = $date->format('Y-m-d H:i:s');

        $date_1d = $date->add(new DateInterval('P1D')); //menambahkan interval 1 hari
        $date_batas = $date_1d->format('Y-m-d H:i:s');

    	if (empty($book->id_booking)) {
    		$booking = Booking::create([
                    'status' => 'belum_lunas',
                    'total_pembayaran' => $request->get('harga_tiket'),
                    'batas_transaksi' => $date_batas,
                    'id_user' => $id
            ]);

    		$detBooking = DetBooking::create([
			        'id_booking' => $booking->id_booking,
			        'harga' => $request->get('harga_tiket'),
			        'id_list_kursi' => $request->get('id_list_kursi')
			]);

            $listKursi = ListKursi::where('id_list_kursi', $request->get('id_list_kursi'))
                                ->update(['status' => 'terpesan']);

        } elseif ($book->id_user == $id && $book->status == 'belum_lunas' && $book->batas_transaksi < $date_now) {
            $booking = Booking::where('id_booking',$book->id_booking)
                                ->update(['status' => 'gagal']);

            $booking = Booking::create([
                    'status' => 'belum_lunas',
                    'total_pembayaran' => $request->get('harga_tiket'),
                    'batas_transaksi' => $date_batas,
                    'id_user' => $id
            ]);

            $detBooking = DetBooking::create([
                    'id_booking' => $booking->id_booking,
                    'harga' => $request->get('harga_tiket'),
                    'id_list_kursi' => $request->get('id_list_kursi')
            ]);

            $listKursi = ListKursi::where('id_list_kursi', $request->get('id_list_kursi'))
                                ->update(['status' => 'terpesan']);
                                
        } elseif ($book->id_user == $id && $book->status == 'belum_lunas') {
            $harga_baru = $detbook->harga;
            $harga_sebelum = $book->total_pembayaran;
            $tot = $harga_baru+$harga_sebelum;

            $booking = Booking::where('id_booking',$book->id_booking)
                                ->update(['total_pembayaran' => $tot]);

    		$detBooking = DetBooking::create([
			        'id_booking' => $book->id_booking,
			        'harga' => $request->get('harga_tiket'),
			        'id_list_kursi' => $request->get('id_list_kursi')
			]);

            $listKursi = ListKursi::where('id_list_kursi', $request->get('id_list_kursi'))
                                ->update(['status' => 'terpesan']);
                                

    	} else {
    		$booking = Booking::create([
                    'status' => 'belum_lunas',
                    'batas_transaksi' => $date_batas,
                    'id_user' => $id
            ]);

    		$detBooking = DetBooking::create([
			        'id_booking' => $booking->id_booking,
			        'harga' => $request->get('harga_tiket'),
			        'id_list_kursi' => $request->get('id_list_kursi')
			]);

            $listKursi = ListKursi::where('id_list_kursi', $request->get('id_list_kursi'))
                                ->update(['status' => 'terpesan']);
                                
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
