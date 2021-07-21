<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos_producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_presupuesto')->unsigned();
            $table->bigInteger('id_producto')->unsigned();
            $table->string('titulo');
            $table->bigInteger('cantidad');
            $table->string('observaciones');
            $table->decimal('precio');
            $table->timestamps();
            $table->foreign('id_presupuesto')->references('id')->on('presupuestos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('productos')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestos_producto');
    }
}
