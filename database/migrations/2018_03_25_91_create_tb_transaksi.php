<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tb_transaksi');
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_transaksi')->unsigned();
            $table->enum('method', ['transfer', 'kartu_kredit']);
            $table->dateTime('waktu_transaksi');
            $table->integer('id_booking')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->foreign('id_booking')->references('id_booking')->on('tb_booking')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('tb_transaksi');
    }
}
