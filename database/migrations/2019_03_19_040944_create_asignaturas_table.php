<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('carrera_id');
            $table->unsignedInteger('periodo_lectivo_id');
            $table->unsignedInteger('periodo_academico_id');   
            $table->string('codigo');
            $table->string('nombre');
            $table->integer('horas_docente');
            $table->integer('horas_practica');
            $table->integer('horas_autonoma');

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
        Schema::dropIfExists('asignaturas');
    }
}
