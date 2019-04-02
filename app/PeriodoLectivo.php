<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class PeriodoLectivo extends Model
{

    public function carreras()
    {
        return $this->hasMany(Carrera::class);
    }

    public function docentes()
    {
        return $this->belongsToMany(Docente::class);
    }
}
