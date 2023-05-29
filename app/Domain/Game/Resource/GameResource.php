<?php

namespace App\Domain\Game\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'developer' => $this->developer,
            'publisher' => $this->publisher,
        ];
    }
}
