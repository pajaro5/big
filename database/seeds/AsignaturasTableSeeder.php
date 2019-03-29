<?php

use Illuminate\Database\Seeder;
use Big\Asignatura;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = rand(1, 6);
        factory(Asignatura::class, $count)->create();
    }
}
