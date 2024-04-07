<?php

namespace App\Repositories\DocumentType;

use App\Models\User\User;
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
    public function getAll(User $user);
}
