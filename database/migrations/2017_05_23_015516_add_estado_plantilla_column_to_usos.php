<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoPlantillaColumnToUsos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usos', function (Blueprint $table) {
            //
            $table->string('template',50)->nullable();
            $table->string('estado',20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usos', function (Blueprint $table) {
            //
            $table->dropColumn('template');
            $table->dropColumn('estado');
        });
    }
}
