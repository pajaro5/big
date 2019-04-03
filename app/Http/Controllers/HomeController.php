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
        $this->middleware('auth');
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
        
        //Obtengo 1 Carrera, ahora está quemado.  Debe traer la carrera del coordinador logeado
        $carrera = $periodoLectivoActual->carreras()->first();

        //consultar los periodos        
        $periodosAcademicos = $carrera->periodosAcademicos()->get();

        //contar los docentes asignados para el periodo lectivo actual

        
        //calcular el total de asignaturas creadas
        $contadorAsignaturas = 0;

        foreach ($periodosAcademicos as $periodoAcademico) {
            $contadorAsignaturas = $contadorAsignaturas + $periodoAcademico->asignaturas->count();
        }

        


        
        return view(
                    'home',
                    compact(
                            'periodosAcademicos',
                            'contadorAsignaturas'
                            )
                );
    }
}
