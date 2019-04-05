<?php

use Faker\Generator as Faker;
use Big\Asignatura;

$factory->define(Asignatura::class, function (Faker $faker, $options) {

    return [
        'codigo' => $faker->numerify('Asignatura ###') ,
        'nombre' => $faker->word,
        'descripcion' => $faker->sentence,
        'jornada' => $faker->randomElement($array = array ('matutina','vespertina','nocturna'))
    ];
});
