<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('companias_id')->nullable();
            $table->string('nombre',50)->nullable();
            $table->string('abreviacion',20)->nullable();
            $table->decimal('primaminima',10,2)->nullable();
            $table->tinyInteger('is_gps');
            $table->tinyInteger('is_contado');
            $table->tinyInteger('is_cuatrocuotas');
            $table->tinyInteger('is_seiscuotas');
            $table->tinyInteger('is_diezcuotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
