<?php

use Faker\Generator as Faker;
use Big\PeriodoLectivo;

$factory->define(Big\Docente::class, function (Faker $faker) {
    
    $periodoLectivoIdLow = PeriodoLectivo::min('id');
    $periodoLectivoIdMax = PeriodoLectivo::max('id');

    return [
        'nombre' => $faker->name,
        'email' => $faker->email,
        'periodo_lectivo_id' => $faker->numberBetween($min = $periodoLectivoIdLow, $max = $periodoLectivoIdMax)
    ];
});
