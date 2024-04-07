<?php

namespace App\Repositories\Evidence;

use Illuminate\Contracts\Pagination\Paginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface EvidenceRepository.
 */
interface EvidenceRepository extends RepositoryInterface
{
    /**
     * @return Paginator
     */
    public function getAll();
}
