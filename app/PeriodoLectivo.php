<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class PeriodoLectivo extends Model
{

    public function matriculas()
    {
        return $this->hasMany('Big\Matricula');
    }
}
