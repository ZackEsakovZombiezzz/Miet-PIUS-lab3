<?php

namespace App\Domain\Game;

use App\Models\Game;
use App\Domain\Game\Request\GameCreateRequest;
use App\Domain\Game\Resource\GameResource;

class GameCreateAction
{
    public function execute(GameCreateRequest $request): GameResource
    {
        $request->validate();

        $game = new Game;
        $game->name = $request->name;
        $game->developer = $request->developer;
        $game->publisher = $request->publisher;
        $game->save();

        return new GameResource($game);
    }
}
