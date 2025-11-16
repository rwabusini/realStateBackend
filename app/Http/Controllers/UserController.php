<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
        return UserResource::collection(User::with('role')->get());
    }

    public function show(User $user)
    {
        $this->authorize('view', $user);
        return new UserResource($user->load('role'));
    }
}