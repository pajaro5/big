<?php

namespace Big\Http\Controllers;

use Illuminate\Http\Request;
use Big\PeriodoAcademico;

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
        //consultar los periodos
        $periodosAcademicos = PeriodoAcademico::where('carrera_id',1)->get();
        return view('home',compact('periodosAcademicos'));
    }
}
