<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDireksiUnique extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('tb_film', function($table){
            $table->dropColumn('direksi');
        });
        Schema::table('tb_film', function (Blueprint $table) {
            $table->string('direksi')->after('tahun_produksi');
        });
        //$table->integer('user_id')->unique(false)->change();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
