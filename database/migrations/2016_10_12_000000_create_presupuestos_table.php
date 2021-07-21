<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_de_presupuesto')->unique()->nullable();
            $table->bigInteger('contacto_id')->unsigned();
            $table->decimal('precio_total');
            $table->decimal('descuento')->nullable();
            $table->decimal('precio_final');
            $table->string('fechaCaducidad')->nullable();
            $table->timestamps();
            $table->foreign('contacto_id')->references('id')->on('contacto')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presupuestos');
    }
}
