<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDataTypeKredit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('method_trans_kartu_kredit', function($table){
            $table->dropColumn('no_kartu_kredit');
        });

        Schema::table('method_trans_kartu_kredit', function (Blueprint $table) {
            $table->string('no_kartu_kredit', 50)->after('id_kartu_kredit');
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
