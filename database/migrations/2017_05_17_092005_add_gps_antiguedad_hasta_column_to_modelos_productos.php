<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGpsAntiguedadHastaColumnToModelosProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modelos_productos', function (Blueprint $table) {
            //
            $table->integer('gpsantiguedadhasta')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modelos_productos', function (Blueprint $table) {
            //
            $table->dropColumn('gpsantiguedadhasta');
        });
    }
}
