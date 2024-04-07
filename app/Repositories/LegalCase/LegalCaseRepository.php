<?php

namespace App\Repositories\LegalCase;

use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LegalCaseRepository.
 */
interface LegalCaseRepository extends RepositoryInterface
{
    public function getAll(User $user): LengthAwarePaginator;
}
