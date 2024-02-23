<?php

namespace App\Repositories\DocumentType;

use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DocumentTypeRepository.
 *
 * @package namespace App\Repositories\DocumentType;
 */
interface DocumentTypeRepository extends RepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll();
}
