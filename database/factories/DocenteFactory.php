<?php

use Faker\Generator as Faker;

$factory->define(Big\Docente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'email' => $faker->email
    ];
});
