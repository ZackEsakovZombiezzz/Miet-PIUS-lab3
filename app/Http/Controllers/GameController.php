<?php

namespace App\Http\Controllers;

use App\Domain\Game\GameCreateAction;
use App\Domain\Game\Request\GameCreateRequest;
use App\Domain\Game\Resource\GameResource;
use App\Models\Game;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GameController extends Controller
{
    public function store(Request $request): GameResource|JsonResponse
    {
        try {
            $action = new GameCreateAction();
            $game = $action->execute(new GameCreateRequest($request->all()));
            return new GameResource($game);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Unable to create the game'], 500);
        }
    }

    public function index(): AnonymousResourceCollection
    {
        $games = Game::all();
        return GameResource::collection($games);
    }

    public function show(Game $game): GameResource
    {
        return new GameResource($game);
    }

    public function update(Request $request, Game $game): GameResource|JsonResponse
    {
        try {
            $gameData = new GameCreateRequest($request->all());
            $game->name = $gameData->name;
            $game->developer = $gameData->developer;
            $game->publisher = $gameData->publisher;
            $game->save();

            return new GameResource($game);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Unable to update the game'], 500);
        }
    }

    public function destroy(Game $game): JsonResponse
    {
        try {
            $game->delete();
            return response()->json(null, 204);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Unable to delete the game'], 500);
        }
    }
}
