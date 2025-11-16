<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Resources\UnitResource;

class UnitController extends Controller
{
    public function index(Property $property)
    {
        return UnitResource::collection($property->units);
    }

    public function store(StoreUnitRequest $request, Property $property)
    {
        $this->authorize('update', $property); // Only owner can add units
        $unit = $property->units()->create($request->validated());
         return response()->json(
         new UnitResource($unit),
        201
    );
    }

    public function show(Property $property, Unit $unit)
    {
        if ($unit->property_id !== $property->id) {
            abort(404);
        }
        return new UnitResource($unit);
    }

    public function update(Request $request, Property $property, Unit $unit)
    {
        $this->authorize('update', $property);
        $unit->update($request->validate([
            'name' => 'sometimes|string',
            'price' => 'sometimes|numeric|min:0',
            'status' => 'sometimes|in:available,booked,rented,maintenance',
            // ... add others
        ]));
        return new UnitResource($unit);
    }

    public function destroy(Property $property, Unit $unit)
    {
        $this->authorize('update', $property);
        $unit->delete();
        return response()->noContent();
    }
}