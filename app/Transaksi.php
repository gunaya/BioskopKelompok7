<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $primaryKey = 'id_transaksi';
	protected $table = 'tb_transaksi';
	protected $fillable = ['method','waktu_transaksi','id_booking','id_user'];
}
