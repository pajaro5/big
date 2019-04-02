<?php

use Illuminate\Database\Seeder;
use Big\Paralelo;

class ParaleloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = generateRandomIntegerBetween(1,3);
        factory(Paralelo::class, $count)->create();
    }
}
