<?php

use Faker\Generator as Faker;
use Big\Estudiante;

$factory->define(Estudiante::class, function (Faker $faker, $options) {
    return [

        'nombre1' => $faker->firstName(),
        'nombre2' => $faker->firstName(),
        'apellido1' => $faker->lastName,
        'apellido2' => $faker->lastName,
        'identificacion' => $faker->numerify('##########'),
        'telefono_celular' => $faker->e164PhoneNumber,
        'correo' => $faker->email 
    ];
});
