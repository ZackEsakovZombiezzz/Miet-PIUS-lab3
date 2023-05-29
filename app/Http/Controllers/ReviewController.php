<?php

namespace App\Http\Controllers;

use App\Domain\Review\Request\ReviewCreateRequest;
use App\Domain\Review\Resource\ReviewResource;
use App\Domain\Review\ReviewCreateAction;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;


class ReviewController extends Controller
{
    public function store(Request $request): JsonResponse|ReviewResource
    {
        $reviewData = new ReviewCreateRequest($request->all());
        $reviewData->validate();

        $review = Review::create($request->all());

        return new ReviewResource($review);
    }

    public function index(): AnonymousResourceCollection
    {
        $reviews = Review::all();
        return ReviewResource::collection($reviews);
    }

    public function show(Review $review): ReviewResource
    {
        return new ReviewResource($review);
    }

    public function update(Request $request, Review $review): JsonResponse|ReviewResource
    {
        try {
            $reviewData = new ReviewCreateRequest($request->all());
            $review->game_id = $reviewData->game_id;
            $review->name = $reviewData->name;
            $review->text = $reviewData->text;
            $review->rating = $reviewData->rating;
            $review->save();

            return new ReviewResource($review);
        } catch (ValidationException $ve) {
            return response()->json(['error' => $ve->getMessage()], 422);
        } catch (QueryException $qe) {
            return response()->json(['error' => 'Unable to update the review due to database constraint violation'], 500);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Unable to update the review'], 500);
        }
    }

    public function destroy(Review $review): JsonResponse
    {
        try {
            $review->delete();
            return response()->json(null, 204);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Unable to delete the review'], 500);
        }
    }
}
