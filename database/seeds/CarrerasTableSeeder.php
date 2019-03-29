<?php

use Illuminate\Database\Seeder;
use Big\Carrera;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 5;
        factory(Carrera::class, $count)->create();
    }
}
