<?php

use Faker\Generator as Faker;
use Big\PeriodoLectivo;

$factory->define(PeriodoLectivo::class, function (Faker $faker) {
    return [
        'codigo' => '2019-1',
        'nombre' => 'Periodo lectivo mayo 2019 - octubre 2019',
        'esActivo' => true
    ];
});
