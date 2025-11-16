<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MaintenanceStaffResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tenant_id' => $this->tenant_id,
            'property_id' => $this->property_id,
            'assigned_staff_id' => $this->assigned_staff_id,
            'description' => $this->description,
            'status' => $this->status,
            'tenant' => new TenantResource($this->whenLoaded('tenant')),
            'property' => new PropertyResource($this->whenLoaded('property')),
            'created_at' => $this->created_at?->toISOString(),
        ];
    }
}