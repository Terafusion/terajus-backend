<?php

namespace App\Policies;

use App\Models\Customer\Customer;
use App\Models\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Customer $customer)
    {
        return $customer->tenant_id === $user->tenant_id;
    }

    public function update(User $user, Customer $customer)
    {
        return $customer->tenant_id === $user->tenant_id;
    }
}
