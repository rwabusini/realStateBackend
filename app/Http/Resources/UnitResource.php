<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UnitResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'property_id' => $this->property_id,
            'name' => $this->name,
            'price' => (float) $this->price,
            'type' => $this->type,
            'rooms' => $this->rooms,
            'furniture_type' => $this->furniture_type,
            'status' => $this->status,
            'services' => $this->services ? explode(',', $this->services) : [],
            'image_url' => $this->image_url,
            'created_at' => $this->created_at?->toISOString(),
        ];
    }
}