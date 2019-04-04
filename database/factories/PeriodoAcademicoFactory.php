<?php

use Faker\Generator as Faker;
use Big\PeriodoAcademico;
use Big\Carrera;

$factory->define(PeriodoAcademico::class, function (Faker $faker) {
    
    return [
        'carrera_id' => 1,//$options['carreraId'],
        'nombre' => $faker->word
    ];
});