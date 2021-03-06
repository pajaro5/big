<?php

namespace Big\Http\Controllers;

use Illuminate\Http\Request;
use Big\PeriodoAcademico;
use Big\PeriodoLectivo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Periodo Lectivo actual
        $periodoLectivoActual = PeriodoLectivo::where('esActivo',true)->first();
        $periodoLectivoNombre = $periodoLectivoActual->nombre;
        $periodoLectivoId = $periodoLectivoActual->id;
        
        //Obtengo 1 Carrera, ahora está quemado.  Debe traer la carrera del coordinador logeado
        $carrera = $periodoLectivoActual->carreras()->where('id',6)->first();

        $estudiantes = $carrera->estudiantesMatriculados($periodoLectivoActual->id)->count();

        //consultar los periodos        
        $periodosAcademicos = $carrera->periodosAcademicos()->orderBy('nivel', 'asc')->get();

        //contar los docentes asignados para el periodo lectivo actual

        
        //calcular el total de asignaturas creadas
        $contadorAsignaturas = 0;
        $contadorMaxJornadas = 0;
        $contadorParalelos = 0;

        foreach ($periodosAcademicos as $periodoAcademico) {
            $contadorAsignaturas = $contadorAsignaturas + $periodoAcademico->asignaturas->count();
            $contadorParalelos = $contadorParalelos + $periodoAcademico->paralelos->count(); 
        }
        
        return view(
                    'home',
                    compact(
                            'periodoLectivoId',
                            'periodoLectivoNombre',
                            'carrera',
                            'contadorAsignaturas',
                            'contadorParalelos',
                            'estudiantes'
                            )
                );
    }
}
