<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pagos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nomina');
            $table->foreign('nomina')->references('nomina')->on('empleados');
            $table->date('fecha');
            //se llena por integrante
            $table->string('laboral')->nullable();
            $table->string('retardos')->nullable();
            $table->string('asistencia')->nullable();
            $table->string('sanciones')->nullable();
            $table->string('incapacidad')->nullable();
            $table->string('ant')->nullable();
            //se llena por equipo
            $table->string('seg')->nullable();
            $table->string('commwip')->nullable();
            $table->string('nva')->nullable();
            $table->string('qsa_calidad')->nullable();
            $table->string('cump_lap')->nullable();
            $table->string('cont_lap')->nullable();
            $table->string('mnc')->nullable();
            $table->string('scrap')->nullable();
            $table->string('asistencia_valor')->nullable();
            $table->string('gms')->nullable();
            $table->string('total')->nullable();
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
        Schema::dropIfExists('pagos');
    }
}
