<?php

use Illuminate\Database\Seeder;
use Big\Estudiante;
use Big\PeriodoLectivo;

class EstudiantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodoLectivo = PeriodoLectivo::where('esActivo',true)->first();
        $carreras = $periodoLectivo->carreras;
        
        $options = array();
        $options['periodo_lectivo_id'] = $periodoLectivo->id;

        foreach ($carreras as $carrera) {
            $options['carrera_id'] = $carrera->id;
            $count = generateRandomIntegerBetween(200,350);
            factory(Estudiante::class, $count)->create($options);
        }
    }
}
