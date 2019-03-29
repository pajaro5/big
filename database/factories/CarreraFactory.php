<?php

use Faker\Generator as Faker;
use Big\Carrera;

$factory->define(Carrera::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
        'modalidad' => $faker->word
    ];
});
