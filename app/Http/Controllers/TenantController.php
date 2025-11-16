<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Resources\TenantResource;

class TenantController extends Controller
{
    public function index()
    {
        return TenantResource::collection(Tenant::all());
    }

    public function store(StoreTenantRequest $request)
    {
        $tenant = Tenant::create($request->validated());
        return new TenantResource($tenant);
    }

    public function show(Tenant $tenant)
    {
        return new TenantResource($tenant);
    }

    public function update(Request $request, Tenant $tenant)
    {
        $tenant->update($request->validate([
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:tenants,email,' . $tenant->id,
            'phone' => 'nullable|string',
        ]));
        return new TenantResource($tenant);
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return response()->noContent();
    }
}