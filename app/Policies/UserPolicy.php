<?php

namespace App\Policies;

use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $authUser, User $user)
    {
        return ($authUser->hasRole('lawyer') || $authUser->hasRole('trainee')) &&
            ($authUser->id === $user->id || $authUser->clients->contains($user) || $authUser->professionals->contains($user));
    }
}
