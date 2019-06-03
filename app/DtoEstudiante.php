<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class DtoEstudiante extends Model
{
    protected $fillable = [
        'periodo_lectivo_id',
        'carrera_id',
        'cedula',
        'asignatura',
        'jornada'
    ];
}
