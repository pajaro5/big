<?php

use Illuminate\Database\Seeder;
use Big\Asignatura;
use Big\PeriodoAcademico;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = PeriodoAcademico::count() * 5;
        factory(Asignatura::class, $count)->create();
    }
}
