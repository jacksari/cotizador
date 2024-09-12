<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('productos_id')->nullable();
            $table->integer('anioantiguedad')->nullable();
            $table->double('porcentajetasa')->nullable();
            $table->double('porcentajecomision')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasas');
    }
}
