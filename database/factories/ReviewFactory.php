<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    public function definition(): array
    {
        return [
            'game_id' => Game::factory(),
            'text' => $this->faker->paragraph(3),
            'rating' => $this->faker->numberBetween(1, 5),
            'name' => $this->faker->name,
        ];
    }
}
