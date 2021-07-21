<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('persona_contacto')->require()->unique();
            $table->string('empresa')->nullable();
            $table->string('nif');
            $table->string('telefono');
            $table->string('email');
            $table->string('web')->nullable();
            $table->boolean('cliente')->default(0)->nullable();
            $table->boolean('proveedor')->default(0)->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacto');
    }
}
