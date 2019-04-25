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
        //dd($carrera->periodosAcademicos[0]->asignaturas[0]->estudiantes->count());

        foreach ($carrera->periodosAcademicos as $periodoAcademico) {
            foreach ($periodoAcademico->asignaturas as $asignatura) {                
                $estudiantes = $asignatura->estudiantes($periodoLectivo->id);
                
                $paralelos = $asignatura->paralelos($periodoLectivo->id);
                dd($estudiantes->count());//hacer metodo paralelos

                $estudiantesPorParalelo = floor($estudiantes->count()/$paralelos->count());

                //shuffle estudiantes
                $estudiantesMezclados = $estudiantes->shuffle();


                //split estudiantes
                $gruposEstudiantes = $estudiantesMezclados->split($estudiantesPorParalelo);

                $contador = 0;
                //asignar estudiante a paralelo
                foreach ($paralelos as $paralelo) {

                    foreach ($gruposEstudiantes[$contador] as $estudiante) {
                        $estudiante->registrarEnParalelo($paralelo);
                    }
                    $contador++;
                }
            }
        }

        return redirect()->route('home');
    }
}
