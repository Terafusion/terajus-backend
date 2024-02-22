<?php

namespace App\Repositories\DocumentRequest;

use Illuminate\Contracts\Pagination\Paginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DocumentRequestRepository.
 *
 * @package namespace App\Repositories\DocumentRequest;
 */
interface DocumentRequestRepository extends RepositoryInterface
{
    public function getAll(): Paginator;
}
