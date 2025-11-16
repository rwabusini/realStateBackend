<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tenant_id' => $this->tenant_id,
            'property_id' => $this->property_id,
            'start_date' => $this->start_date?->toDateString(),
            'end_date' => $this->end_date?->toDateString(),
            'monthly_rent' => (float) $this->monthly_rent,
            'contract_file_url' => $this->contract_file ? asset('storage/' . $this->contract_file) : null,
            'status' => $this->status,
            'tenant' => new TenantResource($this->whenLoaded('tenant')),
            'property' => new PropertyResource($this->whenLoaded('property')),
            'created_at' => $this->created_at?->toISOString(),
        ];
    }
}