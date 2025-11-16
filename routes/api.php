<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MaintenanceStaffController; 
use App\Http\Controllers\MaintenanceRequestController;

// Public auth route
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (require Sanctum token)
Route::middleware('auth:sanctum')->group(function () {

    // Users (admin-only)
    Route::apiResource('users', UserController::class)->only(['index', 'show']);

    // Properties (owned by user)
    Route::apiResource('properties', PropertyController::class);
    Route::apiResource('properties.units', UnitController::class);

    // Tenants
    Route::apiResource('tenants', TenantController::class);

    // Bookings (user's own bookings)
    Route::apiResource('bookings', BookingController::class);

    // Contracts
    Route::apiResource('contracts', ContractController::class);
    Route::apiResource('contracts.invoices', InvoiceController::class);

    // Payments (nested under invoices)
    Route::post('invoices/{invoice}/payments', [PaymentController::class, 'store']);

    // Maintenance Tasks (formerly "MaintenanceStaff")
   
});

// Public route: maintenance worker applications
Route::post('maintenance-requests', [MaintenanceRequestController::class, 'store']);

 Route::apiResource('maintenance-tasks', MaintenanceStaffController::class)
        ;