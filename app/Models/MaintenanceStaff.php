<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceStaff extends Model
{
    use HasFactory;

    protected $table = 'maintenance_staff';

    protected $fillable = [
        'tenant_id',
        'property_id',
        'assigned_staff_id',
        'description',
        'status',
    ];

    // Relationships
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function assignedStaff()
    {
        return $this->belongsTo(MaintenanceStaff::class, 'assigned_staff_id');
    }
}