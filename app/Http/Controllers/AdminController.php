<?php

namespace App\Http\Controllers;

use App\Booking;
use App\DetBooking;
use App\Transaksi;
use App\ListKursi;
use App\Tayang;
use App\TransferMethod;
use App\KreditMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
    	$konfirmasi = Transaksi::join('users','tb_transaksi.id_user','=','users.id')
    						-> leftJoin('tb_booking','tb_transaksi.id_booking','=','tb_booking.id_booking')
    						-> leftJoin('method_trans_trf_bank','method_trans_trf_bank.id_transaksi','=','tb_transaksi.id_transaksi')
    						-> leftJoin('method_trans_kartu_kredit','method_trans_kartu_kredit.id_transaksi','=','tb_transaksi.id_transaksi')
    						-> where('tb_transaksi.status',"dibayar")
    						-> select('tb_transaksi.id_transaksi','users.name','tb_transaksi.waktu_transaksi','tb_booking.total_pembayaran','tb_transaksi.status','tb_transaksi.method','bank','bukti_pembayaran','method_trans_trf_bank.atas_nama as nama_trf','method_trans_kartu_kredit.atas_nama as nama_kredit','no_kartu_kredit')
    						-> get();
    	//dd($konfirmasi);
    	return view('admin-film.konfirmasi', compact('konfirmasi'));
    }
}
