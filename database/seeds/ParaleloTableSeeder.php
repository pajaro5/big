<?php

use Illuminate\Database\Seeder;
use Big\Jornada;
use Carbon\Carbon;

class ParaleloTableSeeder extends Seeder
{
    /**
     * Creates the Paralelo record.
     *
     * @return void
     */
    public function crearParalelo($asignatura, $periodoAcademico, $nombre)
    {
        DB::table('paralelos')->insert([
            'jornada_id' => $asignatura,
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
        //periodo lectivo actual
        $jornadas = Jornada::all();
        foreach ($jornadas as $jornada) {
            $count = generateRandomIntegerBetween(1,3);
            if ($count == 1) {
                $this->crearParalelo($jornada->id, $jornada->periodoAcademico->id, 'A');
            }elseif ($count == 2) {
                $this->crearParalelo($jornada->id, $jornada->periodoAcademico->id, 'A');
                $this->crearParalelo($jornada->id, $jornada->periodoAcademico->id, 'B');
            }else {
                $this->crearParalelo($jornada->id, $jornada->periodoAcademico->id, 'A');
                $this->crearParalelo($jornada->id, $jornada->periodoAcademico->id, 'B');
                $this->crearParalelo($jornada->id, $jornada->periodoAcademico->id, 'C');
            }

        }
    
    }
}
