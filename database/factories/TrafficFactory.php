<?php

namespace Database\Factories;

use App\Models\Traffic;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrafficFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Traffic::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->streetAddress(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'vehiclesDensityInMinutes' => $this->faker->numberBetween($min = 1, $max = 60)
        ];
    }
}
