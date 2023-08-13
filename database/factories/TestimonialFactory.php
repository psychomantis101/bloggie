<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_name'   => $this->faker->name,
            'message'     => $this->faker->sentence,
            'rating'      => $this->faker->numberBetween(0, 5),
        ];
    }
}
