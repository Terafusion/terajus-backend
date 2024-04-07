<?php

namespace App\Repositories\ParticipantType;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ParticipantTypeRepository.
 */
interface ParticipantTypeRepository extends RepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
}
