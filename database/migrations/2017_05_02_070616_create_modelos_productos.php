<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelosProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos_productos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('modelos_id')->nullable();
            $table->integer('planes_id')->nullable();
            $table->integer('usos_id')->nullable();
            $table->integer('companias_id')->nullable();
            $table->integer('productos_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelos_productos');
    }
}
