<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tb_booking');
        Schema::create('tb_booking', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_booking')->unsigned();
            $table->enum('status', ['lunas', 'belum_lunas']);
            $table->integer('total_pembayaran');
            $table->dateTime('batas_transaksi');
            $table->integer('id_user')->unsigned();
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
        Schema::dropIfExists('tb_booking');
    }
}
