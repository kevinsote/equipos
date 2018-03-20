<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('nomina')->index();
            $table->integer('equipo')->unsigned();
            $table->foreign('equipo')->references('id')->on('equipos');
            $table->string('pe')->nullable();
            $table->integer('st')->unsigned();
            $table->foreign('st')->references('id')->on('departamentos');
            $table->string('categoria');
            $table->string('tripulacion');
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
        Schema::dropIfExists('empleados');
    }
}
