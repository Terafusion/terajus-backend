<?php

namespace App\Repositories\Document;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface DocumentRepository.
 *
 * @package namespace App\Repositories\Document;
 */
interface DocumentRepository extends RepositoryInterface
{
    public function getAll(User $user): LengthAwarePaginator;
}
