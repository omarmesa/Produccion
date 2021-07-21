<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('calle');
            $table->string('numero');
            $table->string('piso')->nullable();
            $table->string('puerta')->nullable();
            $table->string('cp');
            $table->string('provincia');
            $table->string('poblacion');
            $table->string('pais')->default("España");
            $table->bigInteger('id_cliente')->unsigned();
            $table->timestamps();
            $table->foreign('id_cliente')->references('id')->on('contacto')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
