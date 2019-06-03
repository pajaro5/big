<?php

namespace Big\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Big\Carrera;
use Big\PeriodoLectivo;
use Big\PeriodoAcademico;
use Big\Asignatura;
use Big\Estudiante;
use Big\DtoEstudiante;
use Illuminate\Support\Facades\DB;

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
            Asignatura::where('periodo_lectivo_id', $periodoLectivoAnterior)->delete();
            Estudiante::where('periodo_lectivo_id', $periodoLectivoAnterior)->delete();
            DB::table('dto_estudiantes')->truncate();
        }
        
        //____________________________________________________


        //Creo periodo lectivo
        $periodoLectivo = new PeriodoLectivo;
        $periodoLectivo->codigo = $codigo;
        $periodoLectivo->nombre = $nombre;
        $periodoLectivo->esActivo = true;
        $periodoLectivo->save();

        dump('periodo lectivo creado');


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

            $responsePeriodosAcademicos = $client->request('GET', 'big/carrera/'. $c->codigo . '/periodosacademicos' );    $PeriodosAcademicosdeEstaCarrera = json_decode($responsePeriodosAcademicos->getBody()->getContents());

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
            //____________________________________________________                
            //asignaturas
            $responseAsignaturas = $client->request('GET', 'big/carrera/'. $c->codigo . '/asignaturas');   
            $asignaturasDeEstaCarrera = json_decode($responseAsignaturas->getBody()->getContents());

            foreach ($asignaturasDeEstaCarrera as $a) {
                $asignatura = new Asignatura;
                $asignatura->carrera_id = $c->id;
                $asignatura->periodo_lectivo_id = $periodoLectivo->id;                
                $asignatura->periodo_academico_id = $this->getPeriodoAcademicoId($c->id, $a->periodo_academico_id);  //aca
                $asignatura->codigo = $a->codigo;
                $asignatura->nombre = $a->nombre;
                $asignatura->horas_docente = $a->horas_docente;
                $asignatura->horas_practica = $a->horas_practica;
                $asignatura->horas_autonoma = $a->horas_autonoma;
                $asignatura->save();
            }
        }        
        
        dump('carreras, periodos académicos, asignaturas');
        //estudiantes
        $responseEstudiantes = $client->request('GET', 'big/estudiantes/'. $periodoLectivo->codigo);
        $estudiantesMatriculados = json_decode($responseEstudiantes->getBody()->getContents());

       
        foreach ($estudiantesMatriculados as $e) {
            $estudiante = new Estudiante;
            $estudiante->periodo_lectivo_id = $periodoLectivo->id;
            $estudiante->carrera_id = $e->carrera_id;
            $estudiante->jornada = $e->jornada;
            $estudiante->nombre1 = $e->nombre1;
            $estudiante->nombre2 = $e->nombre2;
            $estudiante->apellido1 = $e->apellido1;
            $estudiante->apellido2 = $e->apellido2;
            $estudiante->identificacion = $e->identificacion;
            $estudiante->telefono_celular = $e->telefono_celular;
            $estudiante->telefono_fijo = $e->telefono_fijo;
            $estudiante->tiene_discapacidad = $e->tiene_discapacidad;
            $estudiante->correo = $e->correo;
            $estudiante->save();
        }                
        
        dump('estudiantes creados');

        //estudiantes Asignatura 
        set_time_limit(300);
        $responseEstudiantesAsignaturas = $client->request('GET', 'big/estudiantes/'. $periodoLectivo->codigo . '/asignaturas');
        $estudiantesPorAsignatura = json_decode($responseEstudiantesAsignaturas->getBody()->getContents());

        foreach ($estudiantesPorAsignatura as $data) {
            DB::table('asignatura_estudiante')
                        ->insert([
                            'periodo_lectivo_id' => $periodoLectivo->id,
                            'carrera_id' => $data->carrera_id,
                            'cedula' => $data->cedula,
                            'asignatura' => $data->asignatura,
                            'jornada' => $data->jornada
                        ]);

            // DtoEstudiante::create(array(
            //     'periodo_lectivo_id' => $data->periodo_lectivo_id,
            //     'carrera_id' => $data->carrera_id,
            //     'cedula' => $data->cedula,
            //     'asignatura' => $data->asignatura,
            //     'jornada' => $data->jornada
            // ));
            
        }


        //voy a recorrer los estudiantes y actualizo el ID en DTO
        $estudiantesRegistrados = Estudiante::where('periodo_lectivo_id',$periodoLectivo->id)->get();
        foreach ($estudiantesRegistrados as $estudiante) {
            DB::table('asignatura_estudiante')
                        ->where('cedula',$estudiante->identificacion)
                        ->update(['estudiante_id' => $estudiante->id]);            
        }

        //recorrer las asignaturas y actualizo el asignatura_id
        $asignaturasRegistradas = Asignatura::where('periodo_lectivo_id',$periodoLectivo->id)->get();
        foreach ($asignaturasRegistradas as $asignatura) {
            DB::table('asignatura_estudiante')
                        ->where('asignatura',$asignatura->codigo)
                        ->update(['asignatura_id' => $asignatura->id]);
        }

        dd("grabadas:  carreras, periodos académicos, asignaturas, estudiantes, estudiantes_asignaturas, actualizado el ID estudiante e ID asignatura");
        
        //jornadas

        //paralelos
    }

    /**
     * Recupera el ID del periodo académico asignado en este sistema.
     *
     * @return integer
     */
    public function getPeriodoAcademicoId($carreraId, $nivel)
    {        
        return PeriodoAcademico::where('carrera_id',$carreraId)
                                 ->where('nivel', $nivel)
                                 ->first()->id;        
    }
}
