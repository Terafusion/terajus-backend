<?php

namespace App\Repositories\DocumentRequest;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DocumentRequestRepository.
 */
interface DocumentRequestRepository extends RepositoryInterface
{
    public function getAll(User $user): LengthAwarePaginator;
}
