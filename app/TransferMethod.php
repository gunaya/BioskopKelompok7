<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferMethod extends Model
{
    protected $primaryKey = 'id_trf_bank';
	protected $table = 'method_trans_trf_bank';
	protected $fillable = ['bank','nomor_rekening','bukti_pembayaran','atas_nama','id_transaksi'];
}
