<?php

namespace App\Repositories\LegalCase;

use App\Models\LegalCase\LegalCaseParticipant;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class LegalCaseParticipantRepositoryEloquent.
 */
class LegalCaseParticipantRepositoryEloquent extends BaseRepository implements LegalCaseParticipantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LegalCaseParticipant::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
