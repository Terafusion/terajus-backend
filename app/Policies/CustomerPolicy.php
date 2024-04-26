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
        return $customer->tenant_id === $user->tenant_id && $user->checkHasPermission('customer.view');
    }

    public function list(User $user)
    {
        return $user->checkHasPermission('customer.list');
    }

    public function update(User $user, Customer $customer)
    {
        return $customer->tenant_id === $user->tenant_id && $user->checkHasPermission('customer.update');
    }

    public function create(User $user)
    {
        return $user->checkHasPermission('customer.create');
    }

    public function delete(User $user, Customer $customer)
    {
        return $customer->tenant_id === $user->tenant_id && $user->checkHasPermission('customer.delete');
    }
}
