<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	protected $primaryKey = 'id_kategori';
    protected $table = 'tb_kategori';
    protected $fillable = ['kategori','min_umur','max_umur'];
}
