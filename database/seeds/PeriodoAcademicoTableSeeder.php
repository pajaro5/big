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

            if ($count == 1) {
                $options['nivel'] = 1;
                factory(PeriodoAcademico::class, 1)->create($options); 

            } elseif ($count == 2) {
                $options['nivel'] = 1;
                factory(PeriodoAcademico::class, 1)->create($options); 

                $options['nivel'] = 2;
                factory(PeriodoAcademico::class, 1)->create($options); 

            } elseif ($count == 3) {
                $options['nivel'] = 1;
                factory(PeriodoAcademico::class, 1)->create($options); 

                $options['nivel'] = 2;
                factory(PeriodoAcademico::class, 1)->create($options); 

                $options['nivel'] = 3;
                factory(PeriodoAcademico::class, 1)->create($options); 

            } elseif ($count == 4) {
                $options['nivel'] = 1;
                factory(PeriodoAcademico::class, 1)->create($options); 

                $options['nivel'] = 2;
                factory(PeriodoAcademico::class, 1)->create($options); 

                $options['nivel'] = 3;
                factory(PeriodoAcademico::class, 1)->create($options); 

                $options['nivel'] = 4;
                factory(PeriodoAcademico::class, 1)->create($options); 

            } elseif ($count == 5) {
                $options['nivel'] = 1;
                factory(PeriodoAcademico::class, 1)->create($options); 

                $options['nivel'] = 2;
                factory(PeriodoAcademico::class, 1)->create($options); 

                $options['nivel'] = 3;
                factory(PeriodoAcademico::class, 1)->create($options); 

                $options['nivel'] = 4;
                factory(PeriodoAcademico::class, 1)->create($options); 

                $options['nivel'] = 5;
                factory(PeriodoAcademico::class, 1)->create($options); 

            }                        
        }        
    }
}
