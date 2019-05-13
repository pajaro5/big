<?php

namespace Big\Http\Controllers;

use Illuminate\Http\Request;
use Big\PeriodoLectivo;
use Big\Carrera;

class ParaleloController extends Controller
{
    //Realiza la asignación de los estudiantes matriculados a los paralelos.
    public function create(PeriodoLectivo $periodoLectivo, Carrera $carrera)
    {        
        //luego encapsular en un método que devuelva el número de estudiantes a los que se registró en un paralelo
        $estudiantesAsignadosEnParalelo = 0;
        foreach ($carrera->periodosAcademicos as $periodoAcademico) {

            foreach ($periodoAcademico->asignaturas as $asignatura) {     

                $estudiantes = $asignatura->estudiantes($periodoLectivo->id);
                
                $paralelos = $asignatura->paralelos($periodoLectivo->id);
            
                //$estudiantesPorParalelo = floor($estudiantes->count()/count($paralelos));


                //shuffle estudiantes
                $estudiantesMezclados = $estudiantes->get()->shuffle();
               
                //split estudiantes
                $gruposEstudiantes = $estudiantesMezclados->split(count($paralelos));
    

                $contador = 0;
            
                //asignar estudiante a paralelo
                foreach ($paralelos as $paralelo) {

                    foreach ($gruposEstudiantes[$contador] as $estudiante) {
                        $estudiante->registrarEnParalelo($paralelo);
                        $estudiantesAsignadosEnParalelo++;
                    }
                    $contador++;                    
                }
            }
        }

        return response()->json([
            'count' => $estudiantesAsignadosEnParalelo
        ]);
    }
}
