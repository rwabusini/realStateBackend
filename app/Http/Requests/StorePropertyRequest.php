<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Property;

class UpdatePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        $property = Property::findOrFail($this->route('property'));
        return auth()->id() === $property->owner_id;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'location' => ['sometimes', 'string'],
            'address' => ['sometimes', 'string'],
            'city' => ['sometimes', 'string'],
            'country' => ['sometimes', 'string'],
            'price_per_day' => ['sometimes', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'available' => ['sometimes', 'boolean'],
        ];
    }
}