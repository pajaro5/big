<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;
use Big\Asignatura;

class PeriodoAcademico extends Model
{
    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class, )
                    ->where('carrera_id', $this->carrera_id);        
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function paralelos()
    {
        return $this->hasMany(Paralelo::class);
    }

    public function jornadas()
    {
        return $this->hasMany(Jornada::class);
    }
}
