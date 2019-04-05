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
        //recuperar num de carreras
        $carreras = Carrera::all();

        $options = array();

        //para cada carrera crear periodos académicos aleatorios
        foreach ($carreras as $carrera) {
            $options['carrera_id'] = $carrera->id;            
            $count = generateRandomIntegerBetween(1,5);
            factory(PeriodoAcademico::class, $count)->create($options); 
        }
        
    }
}
