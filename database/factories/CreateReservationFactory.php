<?php

namespace Database\Factories;

use App\Models\CreateReservation;
use App\Models\User;
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
            'email' => $this->faker->name(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'capacity' => $this->faker->numberBetween(1,70),
            'comment' => $this->faker->paragraph(),
            'pay' => $this->faker->numberBetween(1,70)
        ];
    }
        public function user()
        {
           return $this->belongsTo('App\User');
        }
        
        //public function service()
        //{
          //  return $this->belongsTo('App\Service');
        //}


}
