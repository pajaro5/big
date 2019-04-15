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
        return $this->hasMany(Estudiante::class);
    }

    public function periodosLectivos()
    {
        return $this->belongsTo(PeriodoLectivo::class);
    }

    public function estudiantesMatriculados($periodoLectivo)
    {
        return $this->estudiantes()
                ->where('periodo_lectivo_id', $periodoLectivo);
    }
}
