<?php

namespace Big\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Big\Carrera;
use Big\PeriodoLectivo;
use Big\PeriodoAcademico;

class ImportarController extends Controller
{    
    public function index()
    {
        $client = new Client([
            'base_uri' => env('MATRICULAS_API_URL'),
            'timeout' => 2.0,
        ]);

        $response = $client->request('GET', 'periodo_lectivos/actual');

        $periodoLectivo = json_decode($response->getBody()->getContents());

        return view('setup.index', compact('periodoLectivo')); 
        
    }

    public function all($codigo,$nombre)
    {   
        //____________________________________________________     
        //Quito la bandera de activo para cualquier periodo pre existente
        PeriodoLectivo::where('esActivo',true)
                        ->update(['esActivo' => false]);

        //Borro si existe previamente el periodo lectivo.     
        echo "<strong>Eliminando </strong> periodo lectivo ID: " . $codigo . "<br>"; 
          
        if (PeriodoLectivo::where('codigo',$codigo)->count() > 0) {
            $periodoLectivoAnterior = PeriodoLectivo::where('codigo',$codigo)->first()->id;

            PeriodoLectivo::where('id',$periodoLectivoAnterior)->delete();            
            Carrera::where('periodo_lectivo_id', $periodoLectivoAnterior)->delete(); 
            PeriodoAcademico::where('periodo_lectivo_id', $periodoLectivoAnterior)->delete();

        }
        
        //____________________________________________________


        //Creo periodo lectivo
        $periodoLectivo = new PeriodoLectivo;
        $periodoLectivo->codigo = $codigo;
        $periodoLectivo->nombre = $nombre;
        $periodoLectivo->esActivo = true;
        $periodoLectivo->save();


        //____________________________________________________
        //Recuperar carreras
        $client = new Client([
            'base_uri' => env('MATRICULAS_API_URL'),
            'timeout' => 2.0,
        ]);

        $response = $client->request('GET', 'big/carreras/'.$codigo);
        $carreras = json_decode($response->getBody()->getContents());
                       
        //grabar carreras en tabla
        foreach ($carreras as $carrera) {
            $c = new Carrera;
            $c->periodo_lectivo_id = $periodoLectivo->id;
            $c->codigo = $carrera->id;
            $c->nombre = $carrera->nombre;
            $c->descripcion = $carrera->descripcion;
            $c->modalidad = $carrera->modalidad;
            $c->save();

            $client1 = new Client([
                'base_uri' => env('MATRICULAS_API_URL'),
                'timeout' => 2.0,
            ]);

            $responsePeriodosAcademicos = $client1->request('GET', 'big/carrera/'. $c->codigo . '/periodosacademicos' );
            //echo "<br>Llamando API de periodos academicos <br>" .  env('MATRICULAS_API_URL') . "big/carrera/" . $c->id . '/periodosacademicos'; 
            $PeriodosAcademicosdeEstaCarrera = json_decode($responsePeriodosAcademicos->getBody()->getContents());
            //____________________________________________________                
            //grabar periodos academicos
            foreach ($PeriodosAcademicosdeEstaCarrera as $pa)
            {
                $per_acad = new PeriodoAcademico;
                $per_acad->periodo_lectivo_id = $periodoLectivo->id;
                $per_acad->carrera_id = $c->id;
                $per_acad->nombre = $pa->nombre;
                $per_acad->nivel = $pa->nivel;
                $per_acad->save();                
            }
        }

        dd("grabadas las carreras y periodos academicos aka niveles");
        
        //____________________________________________________                
       

        //asignaturas

        //jornadas

        //paralelos

        //estudiantes

        //estudiantes Asignatura 

    }
}
