<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura_estudiante', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('asignatura_id');
            $table->unsignedInteger('estudiante_id');
            $table->unsignedInteger('periodo_lectivo_id');
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
        Schema::dropIfExists('asignatura_estudiante');
    }
}
