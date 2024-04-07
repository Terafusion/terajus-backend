<?php

namespace App\Repositories\Customer;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CustomerRepository.
 */
interface CustomerRepository extends RepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
}
