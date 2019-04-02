<?php

use Illuminate\Database\Seeder;
use Big\Carrera;
use Big\PeriodoAcademico;

class PeriodoAcademicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodosAcademicos = generateRandomIntegerBetween(1,5);
        
        $count = Carrera::count() * $periodosAcademicos;
        factory(PeriodoAcademico::class, $count)->create();
    }
}
