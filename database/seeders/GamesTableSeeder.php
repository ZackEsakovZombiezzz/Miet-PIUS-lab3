<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GamesTableSeeder extends Seeder
{
    public function run()
    {
        Game::factory()
            ->count(10)
            ->create();
    }
}
