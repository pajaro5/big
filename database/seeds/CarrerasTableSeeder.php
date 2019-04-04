<?php

use Illuminate\Database\Seeder;
use Big\Carrera;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 2;
        factory(Carrera::class, $count)
            ->create()
            ->each(function ($carrera){
                $carrera->periodosAcademicos()->save(factory(Big\PeriodoAcademico::class,generateRandomIntegerBetween(1,5))->make());

            });
    }
}
