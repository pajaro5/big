<?php

use Faker\Generator as Faker;
use Big\PeriodoAcademico;
use Big\Carrera;

$factory->define(PeriodoAcademico::class, function (Faker $faker) {

    $carreraIdLow = Carrera::min('id');
    $carreraIdMax = Carrera::max('id');


    return [
        'carrera_id' => $faker->numberBetween($min = $carreraIdLow, $max = $carreraIdMax),
        'nombre' => $faker->word
    ];
});
