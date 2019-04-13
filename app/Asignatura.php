<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    public function periodoLectivo()
    {
        return $this->belongsTo(PeriodoLecivo::class);
    }
    
    public function periodoAcademico()
    {
        return $this->belongsTo(PeriodoAcademico::class);
    }

    public function docentes()
    {
        return $this->belongsToMany(Docente::class);
    }

    public function jornadas()
    {
        return $this->hasMany(Jornada::class);
    }

    public function estudiantes($periodoLectivo)
    {
        return $this->belongsToMany(Estudiante::class)
                                        ->withPivot('periodo_lectivo_id')
                                        ->wherePivot('periodo_lectivo_id', $periodoLectivo)
                                        ->withTimestamps();
    }
}
