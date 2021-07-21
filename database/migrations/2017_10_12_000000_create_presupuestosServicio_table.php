<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos_servicio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_presupuesto')->unsigned();
            $table->bigInteger('id_servicio')->unsigned();
            $table->string('titulo');
            $table->bigInteger('cantidad');
            $table->string('observaciones');
            $table->decimal('precio');
            $table->timestamps();
            $table->foreign('id_presupuesto')->references('id')->on('presupuestos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_servicio')->references('id')->on('servicios')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestos_servicio');
    }
}
