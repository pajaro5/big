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
        //dd($periodoLectivo);

        return redirect()->route('home');
    }
}
