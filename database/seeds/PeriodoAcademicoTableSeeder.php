<?php

use Illuminate\Database\Seeder;
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
        $count = 50;
        factory(PeriodoAcademico::class, $count)->create();
    }
}
