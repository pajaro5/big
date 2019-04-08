<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;

class Paralelo extends Model
{
    public function jornada()
    {
        return $this->belongsTo(Jornada::class);
    }
}