<?php

use Illuminate\Database\Seeder;
use Big\PeriodoLectivo;

class PeriodoLectivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 1;
        factory(PeriodoLectivo::class, $count)->create();
    }
}
