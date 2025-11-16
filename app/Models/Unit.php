<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'name',
        'price',
        'type',
        'rooms',
        'furniture_type',
        'status',
        'services',
        'image_url',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'rooms' => 'integer',
    ];

    // Relationships
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}