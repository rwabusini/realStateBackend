<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'location' => $this->location,
            'description' => $this->description,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'price_per_day' => (float) $this->price_per_day,
            'available' => (bool) $this->available,
            'owner' => new UserResource($this->whenLoaded('owner')),
            'units' => UnitResource::collection($this->whenLoaded('units')),
            'created_at' => $this->created_at?->toISOString(),
        ];
    }
}