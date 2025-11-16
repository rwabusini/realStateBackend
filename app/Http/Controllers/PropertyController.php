<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Http\Resources\PropertyResource;

class PropertyController extends Controller
{
    public function index()
    {
        // Public listing (or scope by user role)
        return PropertyResource::collection(
            Property::with('owner', 'units')->get()
        );
    }

    public function store(StorePropertyRequest $request)
    {
        $property = auth()->user()->properties()->create($request->validated());
        return response()->json(
        new PropertyResource($property->load('owner', 'units')),
        201
    );
    }

    public function show(Property $property)
    {
        return new PropertyResource($property->load('owner', 'units'));
    }

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $this->authorize('update', $property); // Policy check
        $property->update($request->validated());
        return new PropertyResource($property->load('owner', 'units'));
    }

    public function destroy(Property $property)
    {
        $this->authorize('delete', $property);
        $property->delete();
        return response()->noContent();
    }
}