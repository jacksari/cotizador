<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesDetalles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('cotizaciones_id')->nullable();
            $table->integer('companias_id')->nullable();
            $table->integer('productos_id')->nullable();
            $table->double('tasa')->nullable();
            $table->double('primaneta')->nullable();
            $table->double('primatotal')->nullable();
            $table->double('descuento')->nullable();
            $table->tinyInteger('is_gps');
            $table->tinyInteger('is_comonuevo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciones_detalles');
    }
}
