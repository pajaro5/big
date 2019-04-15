<?php

use Illuminate\Database\Seeder;
use Big\PeriodoLectivo;

class EstudiantesAsignaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodoLectivo = PeriodoLectivo::where('esActivo',true)->first();

        foreach ($periodoLectivo->carreras as $carrera) {
            $periodosAcademicosAbiertos = $carrera->periodosAcademicos->count();                          
            
            $estudiantesMatriculados = $carrera->estudiantesMatriculados($periodoLectivo->id)->get()->toArray();     

            $estudiantesMatriculadosCount = $carrera->estudiantesMatriculados($periodoLectivo->id)->count();

            //Reparto los estudiantes entre los niveles abiertos
            $estudiantesPorNivel = floor($estudiantesMatriculadosCount/$periodosAcademicosAbiertos);
            
            $idInicio = 0;
            $idHasta = $estudiantesPorNivel-1;
            
            foreach ($carrera->periodosAcademicos as $periodoAcademico) {
                //recupero las asignaturas por periodoAcademico
                $asignaturas = $periodoAcademico->asignaturas->pluck('id')->toArray();
                dd($asignaturas);  //parece que viene una asignatura de mas.

                foreach ($asignaturas as $asignatura) {
                   
                    for ($i=$idInicio; $i < $idHasta  ; $i++) { 
                        
                        DB::table('asignatura_estudiante')->insert(
                            [
                                'asignatura_id' => $asignatura, 
                                'estudiante_id' => $estudiantesMatriculados[$i]['id'],
                                'periodo_lectivo_id' => $periodoLectivo->id
                            ]
                        );
                    }
                                        
                }

                $idInicio = $idHasta;
                $idHasta = $estudiantesPorNivel + $idInicio;  //esta incompleto, incluir IF que ajuste en el último nivel a los que quedan sueltos por el redondeo.

                
            }
            
            

            









        }
    }
}
