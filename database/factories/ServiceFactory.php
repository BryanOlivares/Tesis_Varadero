<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'time1' => $this->faker->time(),
            'time2' => $this->faker->time(),
            'date1' => $this->faker->date(),
            'date2' => $this->faker-date(),
        
            
        ];
    }
}
