<?php

namespace App\Repositories\Evidence;

use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface EvidenceRepository.
 *
 * @package namespace App\Repositories\Evidence;
 */
interface EvidenceRepository extends RepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll();
}
