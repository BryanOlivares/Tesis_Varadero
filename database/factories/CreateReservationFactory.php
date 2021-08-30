<?php

namespace Database\Factories;

use App\Models\CreateReservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class CreateReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CreateReservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service' => $this->faker->name(),
            'name' => $this->faker->name(),
            'lastname' => $this->faker->name(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'capacity' => $this->faker->numberBetween(1,70),
        ];
    }
}
