<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use App\Http\Resources\MaintenanceRequestResource;

class MaintenanceRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:maintenance_requests',
            'phone' => 'nullable|string',
            'specialty' => 'nullable|string',
        ]);

        $mr = MaintenanceRequest::create($request->validated());
        return new MaintenanceRequestResource($mr);
    }
}