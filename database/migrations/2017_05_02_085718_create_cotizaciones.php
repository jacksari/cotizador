<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('seguros_id')->nullable();
            $table->integer('cms_users_id')->nullable();
            $table->integer('marcas_id')->nullable();
            $table->integer('aniofabricacion')->nullable();
            $table->integer('modelos_id')->nullable();
            $table->integer('usos_id')->nullable();
            $table->double('valormercado')->nullable();
            $table->tinyInteger('is_convertidogas');
            $table->string('nombreprospecto',100)->nullable();
            $table->integer('edad')->nullable();
            $table->string('celular',50)->nullable();
            $table->string('email',200)->nullable();
            $table->string('region',50)->nullable();
            $table->string('estado',20)->nullable();
            $table->text('observacion')->nullable();
            $table->tinyInteger('is_mailing');
            $table->integer('planes_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
}
