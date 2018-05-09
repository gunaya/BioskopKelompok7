<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnBuktiTrf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('method_trans_trf_bank', function($table) {
            $table->string('bukti_pembayaran')->after('nomor_rekening');
        });

        Schema::table('method_trans_trf_bank', function($table){
            $table->dropColumn('bukti pembayaran');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('method_trans_trf_bank', function($table){
            $table->dropColumn('bukti_pembayaran');
        });
        //
    }
}
