<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceStaff;
use Illuminate\Http\Request;
use App\Http\Resources\MaintenanceStaffResource;

class MaintenanceStaffController extends Controller
{
    public function index()
    {
        return MaintenanceStaffResource::collection(
            MaintenanceStaff::with('tenant', 'property')->get()
        );
    }

    public function store(Request $request)
    {
        $task = MaintenanceStaff::create($request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'property_id' => 'required|exists:properties,id',
            'description' => 'required|string',
        ]));
        return new MaintenanceStaffResource($task->load('tenant', 'property'));
    }

    public function update(Request $request, MaintenanceStaff $maintenanceStaff)
    {
        $maintenanceStaff->update($request->validate([
            'status' => 'in:pending,in_progress,completed',
            'assigned_staff_id' => 'nullable|exists:maintenance_staff,id',
        ]));
        return new MaintenanceStaffResource($maintenanceStaff);
    }
}