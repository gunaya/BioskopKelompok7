<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataTypeTrf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('method_trans_trf_bank', function($table){
            $table->dropColumn('nomor_rekening');
        });

        Schema::table('method_trans_trf_bank', function (Blueprint $table) {
            $table->string('nomor_rekening', 50)->after('bank');
        });
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
