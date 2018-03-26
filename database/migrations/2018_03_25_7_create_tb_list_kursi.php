<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbListKursi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tb_list_kursi');
        Schema::create('tb_list_kursi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_list_kursi')->unsigned();
            $table->integer('id_kursi')->unsigned();
            $table->integer('id_tayang')->unsigned();
            $table->foreign('id_kursi')->references('id_kursi')->on('tb_kursi')->onDelete('cascade');
            $table->foreign('id_tayang')->references('id_tayang')->on('tb_tayang')->onDelete('cascade');
            $table->enum('status', ['tersedia', 'terpesan', 'sold']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_list_kursi');
    }
}
