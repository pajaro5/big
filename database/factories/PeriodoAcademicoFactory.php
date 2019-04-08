<?php

use Faker\Generator as Faker;
use Big\PeriodoAcademico;

$factory->define(PeriodoAcademico::class, function (Faker $faker, $options) {
    
    return [
        'nombre' => $faker->word
    ];
});