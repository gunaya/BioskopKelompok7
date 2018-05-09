<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KreditMethod extends Model
{
    protected $primaryKey = 'id_kartu_kredit';
	protected $table = 'method_trans_kartu_kredit';
	protected $fillable = ['no_kartu_kredit','atas_nama','id_transaksi'];
}
