<?php

use Faker\Generator as Faker;
use Big\Asignatura;
use Big\PeriodoAcademico;


//recuperar IDs de Periodos Académicos

$factory->define(Asignatura::class, function (Faker $faker) {

    $periodoAcademicoIdLow = PeriodoAcademico::min('id');
    $periodoAcademicoIdMax = PeriodoAcademico::max('id');

    return [
        'periodo_academico_id' => $faker->numberBetween($min = $periodoAcademicoIdLow, $max = $periodoAcademicoIdMax),
        'codigo' => $faker->numerify('Asignatura ###') ,
        'nombre' => $faker->word,
        'descripcion' => $faker->sentence,
        'jornada' => $faker->randomElement($array = array ('matutina','vespertina','nocturna'))
    ];
});
