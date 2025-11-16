<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContractRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check(); // Typically done by admin/owner
    }

    public function rules(): array
    {
        return [
            'tenant_id' => ['required', 'exists:tenants,id'],
            'property_id' => ['required', 'exists:properties,id'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'monthly_rent' => ['required', 'numeric', 'min:0'],
            'contract_file' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'], // 10MB
            'status' => ['sometimes', 'in:active,expired,terminated'],
        ];
    }

    public function messages(): array
    {
        return [
            'end_date.after' => 'Contract end date must be after start date.',
            'contract_file.max' => 'Contract file must be less than 10MB.',
        ];
    }
}