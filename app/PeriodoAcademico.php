<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class PeriodoAcademico extends Model
{
    public function asignaturas()
    {
        return $this->hasMany(Asignatura::class);
    }

    public function carreras()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function paralelos()
    {
        return $this->hasMany(Paralelo::class);
    }
}
