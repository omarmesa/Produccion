<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numero_de_factura')->unique()->nullable();
            $table->bigInteger('contacto_id')->unsigned();
            $table->bigInteger('presupuesto_id')->unsigned();
            $table->decimal('precio_total');
            $table->decimal('descuento')->nullable();
            $table->decimal('precio_final')->nullable();
            $table->string('fechaCaducidad')->nullable();
            $table->timestamps();
            $table->foreign('contacto_id')->references('id')->on('contacto')->onUpdate('cascade');
            $table->foreign('presupuesto_id')->references('id')->on('presupuestos')->onUpdate('cascade')->onDelete('cascade');
        });

        DB::statement("ALTER TABLE factura AUTO_INCREMENT = 24;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
