<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    public function periodosLectivos()
    {
        return $this->belongsTo(PeriodoLectivo::class);
    }

    public function asignaturas($periodoLectivo)
    {
        return $this->belongsToMany(Asignatura::class)
                                        ->withPivot('periodo_lectivo_id')
                                        ->wherePivot('periodo_lectivo_id', $periodoLectivo)
                                        ->withTimestamps();
    }
}
