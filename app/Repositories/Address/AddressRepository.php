<?php

namespace App\Repositories\Address;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AddressRepository.
 */
interface AddressRepository extends RepositoryInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll();
}
