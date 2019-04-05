<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class Paralelo extends Model
{
    public function periodoAcademico()
    {
        return $this->belongsTo(PeriodoAcademico::class);
    }

    public function asignaturas()
    {
        return $this->hasMany(Asignaturas::class);
    }
}