<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'rating', 'game_id', 'text'];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }
}
