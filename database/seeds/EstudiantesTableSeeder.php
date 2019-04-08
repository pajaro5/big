<?php

use Illuminate\Database\Seeder;
use Big\Estudiante;

class EstudiantesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //recuperar num de carreras
        $carreras = Carrera::all();
        $options = array();

        foreach ($$carreras as $carrera) {
            $options['carrera_id'] = $carrera->id;
            $count = generateRandomIntegerBetween(200,350);
            factory(Estudiante::class, $count)->create($options);
        }
    }
}
