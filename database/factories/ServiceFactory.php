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
            'capacity' => $this->faker->numberBetween(1,70),
            'time' => $this->faker->time(),
            'date' => $this->faker->date(),
            'image' => $this->faker->name(),
            
        ];
    }
}
