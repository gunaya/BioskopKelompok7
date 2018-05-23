<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $table = 'tb_studio';
    protected $primaryKey = 'id_studio';
    protected $fillable = ['nama_studio'];
}
