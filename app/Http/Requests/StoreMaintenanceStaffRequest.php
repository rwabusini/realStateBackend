<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaintenanceStaffRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check(); // Tenant or owner can request
    }

    public function rules(): array
    {
        return [
            'tenant_id' => ['required', 'exists:tenants,id'],
            'property_id' => ['required', 'exists:properties,id'],
            'description' => ['required', 'string'],
            'status' => ['sometimes', 'in:pending,in_progress,completed'],
        ];
    }
}