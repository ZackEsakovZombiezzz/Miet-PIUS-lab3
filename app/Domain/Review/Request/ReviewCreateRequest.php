<?php

namespace App\Domain\Review\Request;

use Illuminate\Support\Facades\Validator;
use App\Exceptions\ValidationException;

class ReviewCreateRequest
{
    public $game_id;
    public $name;
    public $text;
    public $rating;

    public function __construct(array $data)
    {
        $this->game_id = $data['game_id'];
        $this->name = $data['name'];
        $this->text = $data['text'];
        $this->rating = $data['rating'];
    }

    public function validate()
    {
        $validator = Validator::make([
            'game_id' => $this->game_id,
            'name' => $this->name,
            'text' => $this->text,
            'rating' => $this->rating,
        ], [
            'game_id' => 'required',
            'name' => 'required',
            'text' => 'required',
            'rating' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
