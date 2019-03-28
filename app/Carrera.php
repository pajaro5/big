<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    public function periodosAcademicos()
    {
        return $this->hasMany(PeriodoAcademico::class);
    }

    public function estudiantes()
    {
        return $this->hasMany('Big\Estudiante');
    }
}
