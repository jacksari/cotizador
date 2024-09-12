<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeducibles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deducibles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('productos_id')->nullable();
            $table->integer('modelos_id')->nullable();
            $table->string('descripcion',300)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deducibles');
    }
}
