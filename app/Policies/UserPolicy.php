<?php

namespace App\Policies;

use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $authUser->tenant_id === $user->tenant_id && $user->checkHasPermission('user.store');
    }

    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $authUser->tenant_id === $user->tenant_id && $user->checkHasPermission('user.update');
    }
}
