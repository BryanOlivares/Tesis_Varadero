<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bryan Olivares Pilataxi',
            'email' => 'bryan.oli@hotmail.com',
            'password' => bcrypt('Bryan_123')
        ])->assignRole('Admin');

        User::factory(5)->create();
    }
}
