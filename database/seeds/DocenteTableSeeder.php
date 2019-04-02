<?php

use Illuminate\Database\Seeder;
use Big\Docente;

class DocenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 8;
        factory(Docente::class, $count)->create();
    }
}
