<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class Paralelo extends Model
{
    public function jornada()
    {
        return $this->belongsTo(Jornada::class);
    }

    public function estudiantes($periodoLectivo)
    {
        return $this->belongsToMany(Estudiante::class)
                                        ->withPivot('periodo_lectivo_id')
                                        ->wherePivot('periodo_lectivo_id', $periodoLectivo)
                                        ->withTimestamps();
    }
}