<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    public function asignaturas()
    {
        return $this->hasMany('Big\Asignatura');
    }

    public function periodoAcademico()
    {
        return $this->belongsTo(Carrera::class);
    }
}
