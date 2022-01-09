<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FolderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'color' => $this->faker->hexColor(),
            'icon' => $this->faker->image(null, 100, 100)
        ];
    }
}
