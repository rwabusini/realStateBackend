<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Property;

class PropertyPolicy
{
    public function before(User $user)
    {
        if ($user->role->name === 'admin') {
            return true;
        }
    }

    public function viewAny(User $user): bool
    {
        return true; // Public listing
    }

    public function create(User $user): bool
    {
        return $user->role->name === 'owner';
    }

    public function update(User $user, Property $property): bool
    {
        return $user->id === $property->owner_id;
    }

    public function delete(User $user, Property $property): bool
    {
        return $user->id === $property->owner_id;
    }
}