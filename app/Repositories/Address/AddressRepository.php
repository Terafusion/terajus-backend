<?php

namespace App\Repositories\Address;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AddressRepository.
 *
 * @package namespace App\Repositories\Address;
 */
interface AddressRepository extends RepositoryInterface
{
        /**
     * @return Collection
     */
    public function getAll();
}
