<?php

use Illuminate\Database\Seeder;
use Big\PeriodoLectivo;
use Carbon\Carbon;

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

            //en el ultimo periodo academico pongo los que sobran
            $contadorPeriodoAcademico = 1;

            $idEstudianteInicio = 0;
            $idEstudianteHasta = $estudiantesPorNivel-1;
            
            foreach ($carrera->periodosAcademicos as $periodoAcademico) {    
                
                $asignaturas = $periodoAcademico->asignaturas->pluck('id')->toArray();

                foreach ($asignaturas as $asignatura) {                  

                    for ($i=$idEstudianteInicio; $i < $idEstudianteHasta  ; $i++) { 
                        
                        DB::table('asignatura_estudiante')->insert(
                            [
                                'asignatura_id' => $asignatura, 
                                'estudiante_id' => $estudiantesMatriculados[$i]['id'],
                                'periodo_lectivo_id' => $periodoLectivo->id,
                                'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                            ]
                        );
                    }

                }                

                $contadorPeriodoAcademico++;

                $idEstudianteInicio = $idEstudianteHasta;

                if ($contadorPeriodoAcademico < $periodosAcademicosAbiertos) {
                    $idEstudianteHasta = $idEstudianteInicio + $estudiantesPorNivel - 1;
                } else{
                    $idEstudianteHasta = count($estudiantesMatriculados);// -1;
                }                
            }
        }
    }
}
