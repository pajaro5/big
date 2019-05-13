<?php

namespace Big;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

    public function paralelos($periodoLectivo)
    {
        return $this->belongsToMany(Paralelo::class) 
                                        ->withPivot('periodo_lectivo_id')
                                        ->wherePivot('periodo_lectivo_id', $periodoLectivo)
                                        ->withTimestamps();
    }

    public function registrarEnParalelo($paralelo)
    {
        DB::insert('insert into estudiante_paralelo (estudiante_id, paralelo_id,periodo_lectivo_id, created_at, updated_at) values (?, ?, ?, ?, ?)', [$this->id, $paralelo->id, $this->periodo_lectivo_id, Carbon::now(), Carbon::now()]);

    }

}
