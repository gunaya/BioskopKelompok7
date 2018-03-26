<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbDetBooking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('tb_det_booking');
        Schema::create('tb_det_booking', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_det_booking')->unsigned();
            $table->enum('status', ['deal', 'pending']);
            $table->integer('harga')->unsigned();
            $table->integer('id_list_kursi')->unsigned()->nullable();
            $table->integer('id_booking')->unsigned()->nullable();
            $table->foreign('id_list_kursi')->references('id_list_kursi')->on('tb_list_kursi')->onDelete('set null');
            $table->foreign('id_booking')->references('id_booking')->on('tb_booking')->onDelete('set null');
           
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
        Schema::dropIfExists('tb_det_booking');
    }
}
