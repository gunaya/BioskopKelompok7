<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tb_kategori');
        Schema::create('tb_kategori', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_kategori');
            $table->string('kategori');
            $table->integer('min_umur');
            $table->integer('max_umur');
            
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
        Schema::dropIfExists('tb_kategori');
    }
}
