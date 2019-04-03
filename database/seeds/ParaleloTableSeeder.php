<?php

use Illuminate\Database\Seeder;
use Big\Paralelo;
use Big\PeriodoAcademico;

class ParaleloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $conteoPeriodosAcademicos = PeriodoAcademico::count();

        $count = generateRandomIntegerBetween(1,8) * $conteoPeriodosAcademicos;        
        factory(Paralelo::class, $count)->create();    
    
    }
}
