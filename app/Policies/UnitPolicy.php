<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Unit;

class UnitPolicy
{
    public function before(User $user)
    {
        if ($user->role->name === 'admin') return true;
    }

    public function create(User $user, $property): bool
    {
        return $user->id === $property->owner_id;
    }

    public function update(User $user, Unit $unit): bool
    {
        return $user->id === $unit->property->owner_id;
    }

    public function delete(User $user, Unit $unit): bool
    {
        return $user->id === $unit->property->owner_id;
    }
}