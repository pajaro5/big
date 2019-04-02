<?php

use Faker\Generator as Faker;
use Big\Carrera;
use Big\PeriodoLectivo;

$factory->define(Carrera::class, function (Faker $faker) {

    $periodoLectivoMinId = PeriodoLectivo::min('id');
    $periodoLectivoMaxId = PeriodoLectivo::max('id');

    return [
        'nombre' => $faker->word,
        'modalidad' => $faker->randomElement($array = array ('presencial','dual')),
        'periodo_lectivo_id' => $faker->randomElement(($array = array ($periodoLectivoMinId, $periodoLectivoMaxId)))
    ];
});
