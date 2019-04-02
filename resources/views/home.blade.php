@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            Lista de periodos habilitados
        </div>
    </div>
    <br> 
    <div class="row">        
        <div class="col-lg-10 ">
            @foreach ($periodosAcademicos as $periodoAcademico)
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
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                @endforeach        
            </div>
            @endforeach
            <br>
        </div>
        <div class="col-lg-2">
            Aquí estadística
           <div class="card" style="width: 18rem;">
               <div class="card-body">
                   <h5 class="card-title">{{ $periodosAcademicos->count() }} periodos académicos</h5>
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
                   <h5 class="card-title">Paralelos</h5>
               </div>
            </div>
            <br>
            <div class="card" style="width: 18rem;">
               <div class="card-body">
                   <h5 class="card-title">Estudiantes</h5>
                   <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                   <p class="card-text">Aquí la info de estudiantes.</p>
                   <a href="#" class="card-link">Card link</a>
                   <a href="#" class="card-link">Another link</a>
               </div>
           </div>
       </div>
    </div>
</div>

@endsection
