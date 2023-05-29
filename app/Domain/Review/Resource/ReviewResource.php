<?php

namespace App\Domain\Review\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'text' => $this->text,
            'rating' => $this->rating,
        ];
    }
}
