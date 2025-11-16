<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'phone',
        'specialty',
    ];

    // Note: This model currently has no relationships.
    // You may want to add: user_id, property_id, status, etc.
}