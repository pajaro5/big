<?php

use Faker\Generator as Faker;
use Big\PeriodoAcademico;

$factory->define(PeriodoAcademico::class, function (Faker $faker) {
    return [
        'carrera_id' => $faker->numberBetween($min = 1, $max = 5),
        'nombre' => $faker->word
    ];
});
