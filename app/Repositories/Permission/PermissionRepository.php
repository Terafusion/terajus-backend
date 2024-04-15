<?php

namespace App\Repositories\Permission;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PermissionRepository.
 *
 * @package namespace App\Repositories\Permission;
 */
interface PermissionRepository extends RepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
}
