<?php

namespace App\Http\Controllers;

use App\Booking;
use App\DetBooking;
use App\Transaksi;
use App\ListKursi;
use App\Tayang;
use App\TransferMethod;
use App\KreditMethod;
use App\User;
use App\Film;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ConsoleTVs\Charts\Facades\Charts;
use DB;

class AdminController extends Controller
{
    public function index()
    {
    	$konfirmasi = Transaksi::join('users','tb_transaksi.id_user','=','users.id')
    						-> leftJoin('tb_booking','tb_transaksi.id_booking','=','tb_booking.id_booking')
    						-> leftJoin('method_trans_trf_bank','method_trans_trf_bank.id_transaksi','=','tb_transaksi.id_transaksi')
    						-> leftJoin('method_trans_kartu_kredit','method_trans_kartu_kredit.id_transaksi','=','tb_transaksi.id_transaksi')
    						-> where('tb_transaksi.status',"dibayar")
    						-> select('tb_transaksi.id_transaksi','users.name','tb_transaksi.waktu_transaksi','tb_booking.total_pembayaran','tb_transaksi.status','tb_transaksi.method','bank','bukti_pembayaran','method_trans_trf_bank.atas_nama as nama_trf','method_trans_kartu_kredit.atas_nama as nama_kredit','no_kartu_kredit', 'nomor_rekening')
                -> groupBy('tb_transaksi.id_transaksi')
    						-> get();
    	//dd($konfirmasi);

      
    	return view('admin-film.konfirmasi', compact('konfirmasi'));
    }

    public function confirm(Request $request)
    {  
    	$confirm = Transaksi::where('id_transaksi',$request->get('id_transaksi'))
                          ->update(['status' => 'lunas']);

      $book = Transaksi::where('id_transaksi',$request->get('id_transaksi'))
                    ->select('id_booking')
                    ->first();
      $id_book = $book->id_booking;
      //dd($id_book);
      
      Booking::where('id_booking', $id_book)
           ->update(['status' => 'lunas']);
      return back();
    }

    public function loadData()
    {
      $transaksi = Transaksi::count();
      $member = User::where('admin',0)
                    ->count();
      $film = Film::count();
      $booking = Transaksi::where('status','dibayar')
                        ->count();

      $hasil = Transaksi::select(DB::raw("COUNT(id_transaksi) as count"), DB::raw("CONCAT(monthname(waktu_transaksi),' ',year(waktu_transaksi)) as month"))
                        ->orderBy("waktu_transaksi")
                        ->groupBy(DB::raw("month(waktu_transaksi)"))
                        ->groupBy(DB::raw("year(waktu_transaksi)"))
                        ->get()
                        ->toArray();
      
      $month = array_column($hasil, 'month');
      $hasil = array_column($hasil, 'count');
      return view ('admin_home',compact('transaksi','member','film','booking','month'))
                  ->with('hasil',json_encode($hasil,JSON_NUMERIC_CHECK))
                  ->with('month',json_encode($month,JSON_NUMERIC_CHECK));
    }

    public function member()
    {
      $hasil = User::where('admin',0)
                  ->paginate(7);
      //dd($hasil->all());
      return view('admin-film/member',compact('hasil'));
    }

    public function transaksi()
    {
      $hasil = Transaksi::join('users','tb_transaksi.id_user','=','users.id')
                        ->select('id_transaksi','waktu_transaksi','name','tb_transaksi.status')
                        ->paginate(7);

      return view('admin-film/transaksi', compact('hasil'));
    }
}
