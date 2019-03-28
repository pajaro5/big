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
}
