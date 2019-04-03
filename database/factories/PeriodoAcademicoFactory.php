<?php

use Faker\Generator as Faker;
use Big\PeriodoAcademico;
use Big\Carrera;

$factory->define(PeriodoAcademico::class, function (Faker $faker, $options) {
    
    return [
        'carrera_id' => $options['carreraId'],
        'nombre' => $faker->word
    ];
});