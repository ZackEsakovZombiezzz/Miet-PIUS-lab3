<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        Review::factory()
            ->count(10)
            ->create();
    }
}
