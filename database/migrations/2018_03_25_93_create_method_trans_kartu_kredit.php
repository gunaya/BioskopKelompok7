<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodTransKartuKredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::dropIfExists('method_trans_kartu_kredit');
        Schema::create('method_trans_kartu_kredit', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_kartu_kredit')->unsigned();
            $table->integer('no_kartu_kredit');
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
        Schema::dropIfExists('method_trans_kartu_kredit');
    }
}
