<?php

namespace App\Domain\Review;

use App\Models\Review;
use App\Domain\Review\Request\ReviewCreateRequest;
use App\Domain\Review\Resource\ReviewResource;

class ReviewCreateAction
{
    public function execute(ReviewCreateRequest $request): ReviewResource
    {
        $request->validate();

        $review = new Review;
        $review->game_id = $request->game_id;
        $review->username = $request->username;
        $review->comment = $request->comment;
        $review->rating = $request->rating;
        $review->save();

        return new ReviewResource($review);
    }
}
