<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTayang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tb_tayang');
        Schema::create('tb_tayang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_tayang');
            $table->dateTime('waktu_tayang');
            $table->integer('harga_tiket');
            $table->integer('id_film')->unsigned();
            $table->integer('id_studio')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_film')->references('id_film')->on('tb_film')->onDelete('cascade');
            $table->foreign('id_studio')->references('id_studio')->on('tb_studio')->onDelete('cascade');
           
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
        Schema::dropIfExists('tb_tayang');
    }
}
