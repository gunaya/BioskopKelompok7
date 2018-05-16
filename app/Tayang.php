<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tayang extends Model
{
    protected $primaryKey = 'id_tayang';
	protected $table = 'tb_tayang';
	protected $fillable = ['waktu_tayang','harga_tiket','id_film','id_studio','id_user'];
    
}
