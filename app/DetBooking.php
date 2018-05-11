<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetBooking extends Model
{
    protected $primaryKey = 'id_det_booking';
	protected $table = 'tb_det_booking';
	protected $fillable = ['status','harga','id_list_kursi','id_booking','unique_code'];
}
