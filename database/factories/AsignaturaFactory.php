<?php

use Faker\Generator as Faker;
use Big\Asignatura;

$factory->define(Asignatura::class, function (Faker $faker) {
    return [
        'periodo_Academico_id' => $faker->randomElement($array = array (1,2,3,4,5)),
        'codigo' => $faker->numerify('Asig ###') ,
        'nombre' => $faker->word,
        'descripcion' => $faker->sentence,
        'jornada' => $faker->randomElement($array = array ('matutina','vespertina','nocturna'))
    ];
});
