<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    public function matricula()
    {
        return $this->belongsTo('Big\Matricula');
    }

    public function periodoAcademico()
    {
        return $this->belongsTo('Big\PeriodoAcademico');
    }

    public function paralelos()
    {
        return $this->belongsToMany(Paralelo::class);
    }

    public function docentes()
    {
        return $this->belongsToMany(Docente::class);
    }
}
