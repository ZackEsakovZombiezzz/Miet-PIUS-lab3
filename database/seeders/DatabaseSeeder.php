<?php

namespace Database\Seeders;


use Database\Seeders\GamesTableSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\ReviewsTableSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
        GamesTableSeeder::class,
        ReviewsTableSeeder::class,
        ]);
    }
}
