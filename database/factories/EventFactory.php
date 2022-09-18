<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            "name" => $this->faker->company(),
            "description" => $this->faker->realText(),
            "image" => $this->faker->Image(),
            "spaces" => $this->faker->biasedNumberBetween($min = 10, $max = 20, $function = 'sqrt'),
            "location" => $this->faker->Address(),
            "date"=> $this->faker->DateTime(),
        ];
    }
}
