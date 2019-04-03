<?php

use Faker\Generator as Faker;
use Big\PeriodoAcademico;
use Big\PeriodoLectivo;

$factory->define(Big\Paralelo::class, function (Faker $faker) {

    $periodoLectivoActivoActual = PeriodoLectivo::where('esActivo',true)->first();
    
    $periodoAcademicoMinId = PeriodoAcademico::min('id');
    $periodoAcademicoMaxId = PeriodoAcademico::max('id');

    return [
        'nombre' => $faker->randomElement($array = array ('A','B','C')),
        'periodo_lectivo_id' => $periodoLectivoActivoActual->id,
        'periodo_academico_id' => $faker->numberBetween($periodoAcademicoMinId,$periodoAcademicoMaxId)        
    ];
});
