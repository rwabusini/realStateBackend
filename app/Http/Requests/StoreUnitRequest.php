<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Property;

class StoreUnitRequest extends FormRequest
{
    public function authorize(): bool
    {
        $propertyId = $this->input('property_id');
        $property = Property::find($propertyId);
        return $property && auth()->id() === $property->owner_id;
    }

    public function rules(): array
    {
        return [
            'property_id' => ['required', 'exists:properties,id'],
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'type' => ['required', 'string'],
            'rooms' => ['required', 'integer', 'min:1'],
            'furniture_type' => ['required', 'string'],
            'status' => ['required', 'in:available,booked,rented,maintenance'],
            'services' => ['nullable', 'string'],
            'image_url' => ['nullable', 'url'],
        ];
    }
}