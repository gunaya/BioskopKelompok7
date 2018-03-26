<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbGenreFilm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tb_genre_film');
        Schema::create('tb_genre_film', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_genre_film');
            $table->string('genre_film');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_genre_film');
    }
}
