<?php

namespace App\Repositories\LegalCase;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LegalCase\LegalCaseParticipantRepository;
use App\Models\LegalCase\LegalCaseParticipant;
use App\Validators\LegalCase\LegalCaseParticipantValidator;

/**
 * Class LegalCaseParticipantRepositoryEloquent.
 *
 * @package namespace App\Repositories\LegalCase;
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
