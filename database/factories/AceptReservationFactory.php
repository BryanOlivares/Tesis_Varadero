<?php

namespace Database\Factories;

use App\Models\AceptReservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class AceptReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AceptReservation::class;

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
            'email' => $this->faker->name(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'capacity' => $this->faker->numberBetween(1,70),
            'state' => $this->faker->name(),
            'comment' => $this->faker->paragraph(),
            'pay' => $this->faker->numberBetween(1,70),
        ];
    }
}
