<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kursi extends Model
{
    protected $table = 'tb_kursi';
    protected $primaryKey = 'id_kursi';
    protected $fillable = ['kode_kursi'];
}
