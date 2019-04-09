@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Carrera: {{ $carrera->nombre }}</h1>
            <h4>{{ $periodoLectivoNombre }}</h4>
        </div>
    </div>
    <br> 
    <div class="row">        
        <div class="col-lg-10 ">
            @foreach ($carrera->periodosAcademicos as $periodoAcademico)
            <br>
            <div class="alert alert-primary" role="alert">
                Periodo académico: {{$periodoAcademico->nombre}}
            </div>
            <div class="row">
                @foreach ($periodoAcademico->asignaturas as $asignatura)                
                <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $asignatura->nombre }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Código: {{ $asignatura->codigo }}</h6>
                            <p class="card-text">{{ $asignatura->descripcion }}</p>
                            <span class="badge badge-secondary">
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
                   <h5 class="card-title">{{ $carrera->periodosAcademicos->count() }} periodos académicos</h5>
               </div>
           </div>
           <br>
           <div class="card" style="width: 18rem;">
               <div class="card-body">
                   <h5 class="card-title"> {{ $contadorAsignaturas }} asignaturas</h5>
               </div>
            </div>
           <br>
           <div class="card" style="width: 18rem;">
               <div class="card-body">
                   <h5 class="card-title"> {{ $contadorParalelos }} paralelos</h5>
               </div>
            </div>
            <br>
            <div class="card" style="width: 18rem;">
               <div class="card-body">
                   <h5 class="card-title"> {{ $estudiantes }} estudiantes</h5>
               </div>
            </div>
       </div>
    </div>
</div>

@endsection
