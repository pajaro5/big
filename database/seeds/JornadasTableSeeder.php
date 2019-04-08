<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Big\PeriodoLectivo;
use Carbon\Carbon;

class JornadasTableSeeder extends Seeder
{
    /**
     * Creates the jornada record.
     *
     * @return void
     */
    public function crearJornada($asignatura, $periodoAcademico, $nombre)
    {
        DB::table('jornadas')->insert([
            'asignatura_id' => $asignatura,
            'periodo_academico_id' => $periodoAcademico,
            'nombre' => $nombre,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodoLectivo = PeriodoLectivo::where('esActivo',true)->first();

        $carreras = $periodoLectivo->carreras;

        foreach ($carreras as $carrera) {
           foreach ($carrera->periodosAcademicos as $periodoAcademico) {
               foreach ($periodoAcademico->asignaturas as $asignatura) {                        
                    $count = generateRandomIntegerBetween(1,3);
                    if ($count == 1) {   
                        $this->crearJornada($asignatura->id, $periodoAcademico->id, 'Matutina');           
                    }elseif ($count == 2) {
                        $this->crearJornada($asignatura->id, $periodoAcademico->id, 'Matutina');           
                        $this->crearJornada($asignatura->id, $periodoAcademico->id, 'Vespertina');          
                    }else {
                        $this->crearJornada($asignatura->id, $periodoAcademico->id, 'Matutina');           
                        $this->crearJornada($asignatura->id, $periodoAcademico->id, 'Vespertina');
                        $this->crearJornada($asignatura->id, $periodoAcademico->id, 'Nocturna');
                    }                          
               }
           }             
        }
    }
}
