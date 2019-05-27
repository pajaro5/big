@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Distributivo Docente</h1>
            <h2><i class="fas fa-university fa-2x"></i> Carrera {{ $carrera->nombre }}</h2>
            <h4>{{ $periodoLectivoNombre }}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="Herramientas">
                    <form>
                    <button type="submit" formaction="paralelos/estudiantes/create/{{$periodoLectivoId}}/{{$carrera->id}}" class="btn btn-secondary"><i class="fal fa-sitemap fa-lg"></i> Distribuir paralelos</button>                  
                        <button type="button" class="btn btn-secondary">4</button>
                    </form>
                </div>
                <div class="btn-group mr-2" role="group" aria-label="Second group">
                  <button type="button" class="btn btn-secondary">5</button>
                  <button type="button" class="btn btn-secondary">6</button>
                  <button type="button" class="btn btn-secondary">7</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                  <button type="button" class="btn btn-secondary">8</button>
                </div>
            </div>
        </div>
    </div>

    <br> 
    <div class="row">        
        <div class="col-lg-10 ">
            @foreach ($carrera->periodosAcademicos as $periodoAcademico)
            <br>
            <div class="alert alert-primary" role="alert">
                Periodo académico: {{$periodoAcademico->nombre}},  # {{ $periodoAcademico->nivel }}
            </div>
            <div class="row">
                @foreach ($periodoAcademico->asignaturas as $asignatura)                
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $asignatura->nombre }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Código: {{ $asignatura->codigo }}</h6>
                            <p class="card-text">{{ $asignatura->descripcion }}</p>  
                                                    
                            <button type="button" class="btn btn-outline-primary">                                
                                <i class="fal fa-users fa-lg"></i>                                
                                Estudiantes 
                                <span class="badge badge-light">{{ $asignatura->estudiantes($periodoLectivoId)->count() }} </span>
                            </button>

                            <hr>
                            <span class="badge badge-primary">
                                <i class="fal fa-clock fa-lg"></i>                               
                                {{ $asignatura->jornadas->count() }} 
                                @if ($asignatura->jornadas->count() > 1)
                                    jornadas
                                @else
                                    jornada
                                @endif
                            </span>
                            <br>
                            @foreach ($asignatura->jornadas as $jornada)
                                <b>{{ $jornada->nombre }}</b>: 
                                @foreach($jornada->paralelos as $paralelo)
                                    {{ $paralelo->nombre }}&nbsp;
                                @endforeach
                                <br>
                            @endforeach                             
                        </div>
                    </div>
                </div>
                @endforeach        
            </div>
            @endforeach
            <br>
        </div>
        <div class="col-lg-2">
           <div class="card" style="width: 18rem;">
               <div class="card-body">
                   <h5 class="card-title"> <i class="fas fa-align-justify"></i> {{ $carrera->periodosAcademicos->count() }} periodos académicos</h5>
               </div>
           </div>
           <br>
           <div class="card" style="width: 18rem;">
               <div class="card-body">
                   <h5 class="card-title"> <i class="fas fa-folder"></i> {{ $contadorAsignaturas }} asignaturas</h5>
               </div>
            </div>
           <br>
           <div class="card" style="width: 18rem;">
               <div class="card-body">
                   <h5 class="card-title"><i class="fal fa-sitemap"></i> {{ $contadorParalelos }} paralelos</h5>
               </div>
            </div>
            <br>
            <div class="card" style="width: 18rem;">
               <div class="card-body">
                   <h5 class="card-title"> <i class="fal fa-users"> </i>{{ $estudiantes }} estudiantes</h5>
               </div>
            </div>
       </div>
    </div>
</div>

@endsection
