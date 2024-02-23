<?php

namespace App\Repositories\ParticipantType;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ParticipantTypeRepository.
 *
 * @package namespace App\Repositories\ParticipantType;
 */
interface ParticipantTypeRepository extends RepositoryInterface
{
    public function getAll(): LengthAwarePaginator;
}
