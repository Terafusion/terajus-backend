<?php

namespace App\Repositories\Customer;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CustomerRepository.
 *
 * @package namespace App\Repositories\Customer;
 */
interface CustomerRepository extends RepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
}
