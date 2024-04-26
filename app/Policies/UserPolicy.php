<?php

namespace App\Policies;

use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function create(User $authUser)
    {
        return $authUser->checkHasPermission('user.create');
    }

    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $authUser->tenant_id === $user->tenant_id && $user->checkHasPermission('user.update');
    }
    public function view(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $authUser->tenant_id === $user->tenant_id && $user->checkHasPermission('user.view');
    }
}
