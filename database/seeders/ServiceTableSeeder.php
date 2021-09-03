<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'service' => $faker->sentence,
            'description' => $faker->paragraph,
            'description' => $faker->number,
            'category_id' => $faker->numberBetween(1, 3)
            ]);
    
    }
}
