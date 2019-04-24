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
        dd($carrera->periodosAcademicos[0]->asignaturas[0]->estudiantes->count());

        foreach ($carrera->periodosAcademicos as $periodoAcademico) {
            foreach ($periodoAcademico->asignaturas as $asignatura) {
                $estudiantes = $asignatura->estudiantes($periodoLectivo->id);
                $paralelos = $asignatura->paralelos($periodoLectivo->id);

                $estudiantesPorParalelo = floor($estudiantes->count()/$paralelos->count());

                //shuffle estudiantes
                $estudiantesMezclados = $estudiantes->shuffle();


                //split estudiantes
                $gruposEstudiantes = $estudiantesMezclados->split($estudiantesPorParalelo);

                //asignar estudiante a paralelo
                foreach ($asignatura->paralelos as $paralelo) {
                    # code...
                }
            }
        }

        return redirect()->route('home');
    }
}
