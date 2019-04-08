<?php

use Illuminate\Database\Seeder;
use Big\Jornada;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PeriodoLectivoSeeder::class,
            CarrerasTableSeeder::class,
            PeriodoAcademicoTableSeeder::class,
            AsignaturasTableSeeder::class,
            JornadasTableSeeder::class,
            ParaleloTableSeeder::class,
            //DocenteTableSeeder::class,            
        ]);
    }
}
