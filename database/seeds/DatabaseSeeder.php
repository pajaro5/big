<?php

use Illuminate\Database\Seeder;

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
            DocenteTableSeeder::class,
            AsignaturasTableSeeder::class
        ]);
    }
}
