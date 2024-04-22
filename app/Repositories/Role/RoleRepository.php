<?php

namespace App\Repositories\Role;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RoleRepository.
 */
interface RoleRepository extends RepositoryInterface
{
    public function getAll(User $user): LengthAwarePaginator;
}
