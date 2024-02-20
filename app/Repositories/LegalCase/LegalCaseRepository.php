<?php

namespace App\Repositories\LegalCase;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Collection;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface LegalCaseRepository.
 *
 * @package namespace App\Repositories\LegalCase;
 */
interface LegalCaseRepository extends RepositoryInterface
{
    public function getAll(User $user): Collection;
}
