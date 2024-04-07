<?php

namespace App\Repositories\LegalPleading;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LegalPleadingRepository.
 */
interface LegalPleadingRepository extends RepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
}
