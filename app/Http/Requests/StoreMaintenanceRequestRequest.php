<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaintenanceRequestRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Anyone can apply (public form)
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:maintenance_requests'],
            'phone' => ['nullable', 'string'],
            'specialty' => ['nullable', 'string'],
        ];
    }
}