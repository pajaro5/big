<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    public function periodoAcademico()
    {
        return $this->belongsTo(PeriodoAcademico::class);
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function paralelos()
    {
        return $this->hasMany(Paralelo::class);
    }
}