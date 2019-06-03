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
            $table->unsignedInteger('periodo_lectivo_id');
            $table->unsignedInteger('carrera_id');
            $table->string('cedula');
            $table->unsignedInteger('estudiante_id')->nullable(true);  //aqui se actualiza el ID que da BIG, luego de importar los datos
            $table->string('asignatura');
            $table->unsignedInteger('asignatura_id')->nullable(true); //aqui se actualiza el ID de la asignatura que da BIG
            $table->string('jornada')->nullable(true);
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
