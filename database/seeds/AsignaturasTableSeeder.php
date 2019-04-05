<?php

use Illuminate\Database\Seeder;
use Big\Asignatura;
use Big\PeriodoAcademico;
use Big\PeriodoLectivo;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //periodo lectivo actual
        $periodoLectivo = PeriodoLectivo::where('esActivo',true)->first();
        
        $carreras = $periodoLectivo->carreras;

        //para las carreras recuperar los periodos académicos 
        foreach ($carreras as $carrera) {
            foreach ($carrera->periodosAcademicos() as $periodoAcademico) {
                //en cada periodo académico asignar entre 1 y 5 asignaturas
                $options['carrera_id'] = $carrera->id;
                $options['periodo_academico_id'] = $periodoAcademico->id; 
                
                $count = generateRandomIntegerBetween(1,5);
                factory(Asignatura::class, $count)->create($options);                 
            }
        }
    }
}
