<?php

namespace Database\Factories;

use App\Models\Intersection;
use Illuminate\Database\Eloquent\Factories\Factory;

class IntersectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Intersection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'traffic_id' => $this->faker->unique()->numberBetween(1, 1000),
            'name' => "north",
            'waitingTimeInSeconds' => $this->faker->numberBetween($min = 1, $max = 60),
            'currentStatus' => $this->faker->numberBetween($min = 1, $max = 3)
        ];
    }
}
