<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocentePeriodoLectivo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_periodo_lectivo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('docente_id');
            $table->unsignedBigInteger('asignatura_id');
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
        Schema::dropIfExists('docente_periodo_lectivo');
    }
}
