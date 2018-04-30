<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $primaryKey = 'id_booking';
	protected $table = 'tb_booking';
	protected $fillable = ['status','total_pembayaran','batas_transaksi','id_user'];
}
