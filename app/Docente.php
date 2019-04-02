<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    public function asignaturas()
    {
        return $this->belongsToMany(Asignaturas::class);
    }
}
