<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use DateInterval;

use App\Booking;
use App\DetBooking;
use App\Transaksi;
use App\ListKursi;
use App\Tayang;
use App\TransferMethod;
use App\KreditMethod;
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
                    'id_list_kursi' => $request->get('id_list_kursi'),
                    'status' => 'pending'
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
                    'id_list_kursi' => $request->get('id_list_kursi'),
                    'status' => 'pending'
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
                    'id_list_kursi' => $request->get('id_list_kursi'),
                    'status' => 'pending'
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
                    'id_list_kursi' => $request->get('id_list_kursi'),
                    'status' => 'pending'
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
            ->where('tb_det_booking.status','pending')
            ->select('nama_film','harga','tb_booking.id_booking','tb_det_booking.status')
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
            ->where('tb_det_booking.status','pending')
            ->select('nama_film','harga','tb_booking.id_booking')
            ->get();

        //dd($hasil->all());

        return view('transaksi.checkout',compact('hasil'));
    }

    public function pembayaran(Request $request)
    {
        $date = new DateTime();
        $date->setTimeZone(new DateTimeZone('Asia/Hong_Kong'));
        $date_now = $date->format('Y-m-d H:i:s');

        //dd($request->all());

        $book_id = $request->get('id_booking');
        $cek = Transaksi::where('id_booking',$book_id)
                        ->select('id_booking','id_transaksi')
                        ->first();

        $book = Booking::where('id_booking', $book_id)
                        ->select('batas_transaksi')
                        ->first();

        if (empty($cek)) {
            $transaksi = Transaksi::create([
                        'method' => $request->get('method'),
                        'waktu_transaksi' => $date_now,
                        'id_booking' => $request->get('id_booking'),
                        'id_user' => $request->get('id_user')
            ]);
        } elseif ($cek->id_booking != $book_id) {
            $transaksi = Transaksi::create([
                        'method' => $request->get('method'),
                        'waktu_transaksi' => $date_now,
                        'id_booking' => $request->get('id_booking'),
                        'id_user' => $request->get('id_user')
            ]);
        } else {
            $transaksi = Transaksi::where('id_booking',$book_id)
                        ->select('id_transaksi','method')
                        ->first();
        }
        return view('transaksi.pembayaran',compact('book','transaksi'));
    }

    public function kredit(Request $request)
    {
        KreditMethod::create([
            'no_kartu_kredit' => $request->get('no_kartu_kredit'),
            'atas_nama' => $request->get('atas_nama'),
            'id_transaksi' => $request->get('id_transaksi')
        ]);

        $user_id = $request->get('id_user');
        return $this->status($user_id);
    }

    public function transfer(Request $request)
    {
        //dd($request->all());
        $image = $request->file('bukti_pembayaran');
        $filename = $request->get('id_transaksi'). "_" . date('m-d-Y', time()) . '.' . $image->getClientOriginalExtension();
        $image->move('upload\bukti_trf', $filename, file_get_contents($image->getRealPath()));

        $trf = new TransferMethod;
        $trf->bank = $request->get('bank');
        $trf->nomor_rekening = $request->get('nomor_rekening');
        $trf->bukti_pembayaran = $filename;
        $trf->atas_nama = $request->get('atas_nama');
        $trf->id_transaksi = $request->get('id_transaksi');
        $trf->save();

        $user_id = $request->get('id_user');
        return $this->status($user_id);
    }

    public function status($user_id)
    {
        //dd($user_id);
        $hasil = Booking::join('tb_det_booking', 'tb_det_booking.id_booking','=','tb_booking.id_booking')
            ->leftJoin('tb_list_kursi','tb_det_booking.id_list_kursi','=','tb_list_kursi.id_list_kursi')
            ->leftJoin('tb_tayang','tb_list_kursi.id_tayang','=','tb_tayang.id_tayang')
            ->leftJoin('tb_kursi','tb_list_kursi.id_kursi','=','tb_kursi.id_kursi')
            ->leftJoin('tb_film','tb_tayang.id_film','=','tb_film.id_film')
            ->WHERE('tb_booking.id_user',$user_id)
            ->select('nama_film','tb_kursi.kode_kursi','tb_booking.batas_transaksi','unique_code','tb_tayang.waktu_tayang','tb_booking.status')
            ->get();
        $trans = Transaksi::where('tb_transaksi.id_user', $user_id)
            ->select('id_transaksi','method')
            ->orderBy('created_at','desc')
            ->first();

        if ($trans->method == 'transfer') {
            $method = TransferMethod::where('id_transaksi',$trans->id_transaksi)
                                    ->select('id_trf_bank as id')
                                    ->orderBy('created_at','desc')
                                    ->first();
        } else {
            $method = KreditMethod::where('id_transaksi',$trans->id_transaksi)
                                    ->select('id_kartu_kredit as id')
                                    ->orderBy('created_at','desc')
                                    ->first();
        }
        //dd($trans,$method);
        return view('transaksi.status',compact('hasil','trans','method'));
    }
}
