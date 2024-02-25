<?php

namespace App\Repositories\DocumentRequest;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DocumentRequestRepository.
 *
 * @package namespace App\Repositories\DocumentRequest;
 */
interface DocumentRequestRepository extends RepositoryInterface
{
    public function getAll(User $user): LengthAwarePaginator;
}
