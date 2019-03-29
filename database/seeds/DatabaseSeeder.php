<?php

use Illuminate\Database\Seeder;
use Big\Asignatura;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
            CarrerasTableSeeder::class,
            PeriodoAcademicoTableSeeder::class,
            AsignaturasTableSeeder::class
        ]);
    }
}
