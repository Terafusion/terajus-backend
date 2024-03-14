<?php

namespace App\Repositories\LegalPleadingType;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LegalPleadingTypeRepository.
 */
interface LegalPleadingTypeRepository extends RepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
}
