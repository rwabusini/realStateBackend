<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

  public function run()
{
    // Roles
    $adminRole = \App\Models\Role::create(['name' => 'admin']);
    $ownerRole = \App\Models\Role::create(['name' => 'owner']);
    $renterRole = \App\Models\Role::create(['name' => 'renter']);

    // Admin user
    $admin = \App\Models\User::factory()->create([
        'role_id' => $adminRole->id,
        'email' => 'admin@example.com'
    ]);

    // 5 owners
    $owners = \App\Models\User::factory()->count(5)->create(['role_id' => $ownerRole->id]);

    // Each owner has 2 properties
    foreach ($owners as $owner) {
        $properties = \App\Models\Property::factory()->count(2)->create(['owner_id' => $owner->id]);
        foreach ($properties as $property) {
            \App\Models\Unit::factory()->count(3)->create(['property_id' => $property->id]);
        }
    }

    // Tenants
    $tenants = \App\Models\Tenant::factory()->count(10)->create();

    // Contracts
    foreach ($tenants as $tenant) {
        $property = \App\Models\Property::inRandomOrder()->first();
        $contract = \App\Models\Contract::factory()->create([
            'tenant_id' => $tenant->id,
            'property_id' => $property->id
        ]);

        // Invoice
        $invoice = \App\Models\Invoice::factory()->create(['contract_id' => $contract->id]);
        \App\Models\Payment::factory()->create(['invoice_id' => $invoice->id]);
    }

    // Bookings
    \App\Models\Booking::factory()->count(20)->create();
}
}
