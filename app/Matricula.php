<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    public function estudiante()
    {
        return $this->belongsTo('Big\Estudiante');
    }

    public function periodoLectivo()
    {
        return $this->belongsTo('Big\PeriodoLectivo');
    }

    public function asignaturas()
    {
        return $this->hasMany('Big\Asignaturas');
    }
}

