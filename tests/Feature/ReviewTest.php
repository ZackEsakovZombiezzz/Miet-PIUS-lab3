<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test GET /api/reviews endpoint
     *
     * @return void
     */
    public function testGetReviews()
    {
        $response = $this->get('/api/reviews');
        $response->assertStatus(200);
    }

    /**
     * Test POST /api/reviews endpoint
     *
     * @return void
     */
    public function testCreateReview()
    {
        $game = Game::factory()->create();

        $response = $this->post('/api/reviews', [
            'game_id' => $game->id,
            'rating' => 5,
            'name' => 'John Doe',
            'text' => 'Great game!'
        ]);
        $response->assertStatus(201);
    }

    /**
     * Test GET /api/reviews/{id} endpoint
     *
     * @return void
     */
    public function testGetReview()
    {
        $game = Game::factory()->create();
        $review = $game->reviews()->create([
            'rating' => 4,
            'name' => 'Jane Smith',
            'text' => 'Good game!'
        ]);

        $response = $this->get('/api/reviews/' . $review->id);
        $response->assertStatus(200);
    }

    /**
     * Test PUT /api/reviews/{id} endpoint
     *
     * @return void
     */
    public function testUpdateReview()
    {
        $game = Game::factory()->create();
        $review = $game->reviews()->create([
            'rating' => 4,
            'name' => 'Jane Smith',
            'text' => 'Good game!'
        ]);

        $response = $this->put('/api/reviews/' . $review->id, [
            'game_id' => $game->id,
            'rating' => 5,
            'name' => 'Alice Johnson',
            'text' => 'Great game!'
        ]);
        $response->assertStatus(200);
    }

    /**
     * Test DELETE /api/reviews/{id} endpoint
     *
     * @return void
     */
    public function testDeleteReview()
    {
        $game = Game::factory()->create();
        $review = $game->reviews()->create([
            'rating' => 4,
            'name' => 'Jane Smith',
            'text' => 'Good game!'
        ]);

        $response = $this->delete('/api/reviews/' . $review->id);
        $response->assertStatus(204);
    }
}
