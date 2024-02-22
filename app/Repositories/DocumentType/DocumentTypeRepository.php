<?php

namespace App\Repositories\DocumentType;

use Illuminate\Contracts\Pagination\Paginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DocumentTypeRepository.
 *
 * @package namespace App\Repositories\DocumentType;
 */
interface DocumentTypeRepository extends RepositoryInterface
{
    /**
     * @return Paginator
     */
    public function getAll();
}
