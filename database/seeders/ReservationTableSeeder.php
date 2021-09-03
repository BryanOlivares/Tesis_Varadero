<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciamos la tabla categories
        $faker = \Faker\Factory::create();
            for ($i = 0; $i < 3; $i++) {
    Reservation::create([
    'service' => $faker->word
 ]);
 }
    }
}
