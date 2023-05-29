<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'developer' => $this->faker->sentence(3),
            'publisher' => $this->faker->sentence(3),
        ];
    }
}
