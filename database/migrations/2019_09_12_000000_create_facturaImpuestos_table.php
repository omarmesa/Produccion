<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaImpuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturaImpuestos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('factura_id')->unsigned();
            $table->bigInteger('impuesto_id')->unsigned();
            $table->string('precio');
            $table->timestamps();
            $table->foreign('factura_id')->references('id')->on('factura')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('impuesto_id')->references('id')->on('impuestos')->onUpdate('cascade')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturaImpuestos');
    }
}
