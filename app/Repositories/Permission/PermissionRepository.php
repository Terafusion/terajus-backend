<?php

namespace App\Repositories\Permission;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PermissionRepository.
 */
interface PermissionRepository extends RepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
}
