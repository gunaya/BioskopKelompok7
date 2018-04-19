<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_genre_film extends Model
{
	protected $primaryKey = 'id_genre_film';
    protected $table = 'tb_genre_film';
    protected $fillable = ['genre_film'];
}