<?php

use Faker\Generator as Faker;
use Big\PeriodoAcademico;

$factory->define(Big\Paralelo::class, function (Faker $faker) {
    
    $periodoAcademicoMinId = PeriodoAcademico::min('id');
    $periodoAcademicoMaxId = PeriodoAcademico::max('id');

    return [
        'nombre' => $faker->randomElement($array = array ('A','B','C')),
        'periodo_academico_id' => $faker->numberBetween($periodoAcademicoMinId,$periodoAcademicoMaxId)        
    ];
});
