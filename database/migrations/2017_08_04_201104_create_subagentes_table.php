<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubagentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subagentes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre',100)->nullable();
            $table->string('direccion',300)->nullable();
            $table->string('telefono',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subagentes');
    }
}
