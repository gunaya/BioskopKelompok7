<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbFilm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tb_film');
        Schema::create('tb_film', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_film');
            $table->string('nama_film');
            $table->string('tahun_produksi');
            $table->string('direksi')->unique();
            $table->string('pemain');
            $table->string('sinopsis');
            $table->string('bahasa');
            $table->string('negara');
            $table->integer('id_genre_film')->unsigned()->fillable();
            $table->integer('id_kategori')->unsigned()->fillable();
            $table->foreign('id_genre_film')->references('id_genre_film')->on('tb_genre_film')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('tb_kategori')->onDelete('cascade');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_film');
    }
}
