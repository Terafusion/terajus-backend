<?php

namespace App\Repositories\DocumentType;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DocumentTypeRepository.
 */
interface DocumentTypeRepository extends RepositoryInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll();
}
