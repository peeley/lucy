<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'width' => $this->faker->randomDigitNotNull(),
            'height' => $this->faker->randomDigitNotNull()
        ];
    }
}
