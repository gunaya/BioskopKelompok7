<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodTransTrfBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('method_trans_trf_bank');
        Schema::create('method_trans_trf_bank', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_trf_bank')->unsigned();
            $table->string('bank');
            $table->integer('nomor_rekening');
            $table->integer('bukti pembayaran');
            $table->string('atas_nama');
            $table->integer('id_transaksi')->unsigned();
            $table->foreign('id_transaksi')->references('id_transaksi')->on('tb_transaksi')->onDelete('cascade');
            
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
        Schema::dropIfExists('method_trans_trf_bank');
    }
}
