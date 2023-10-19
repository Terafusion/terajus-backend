<?php

namespace App\Repositories\Document;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DocumentTypeRepository.
 *
 * @package namespace App\Repositories\Document;
 */
interface DocumentTypeRepository extends RepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll();
}
