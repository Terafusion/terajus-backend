<?php

namespace App\Repositories\User;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories\User;
 */
interface UserRepository extends RepositoryInterface
{
    public function getAll(User $user): Paginator;
}
