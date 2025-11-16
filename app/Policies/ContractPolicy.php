<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Contract;

class ContractPolicy
{
    public function before(User $user)
    {
        return $user->role->name === 'admin' || $user->role->name === 'owner';
    }
}