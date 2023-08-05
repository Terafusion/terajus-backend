<?php

namespace App\Repositories\LegalCase;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LegalCase\LegalCasesParticipantRepository;
use App\Models\LegalCase\LegalCasesParticipant;
use App\Validators\LegalCase\LegalCasesParticipantValidator;

/**
 * Class LegalCasesParticipantRepositoryEloquent.
 *
 * @package namespace App\Repositories\LegalCase;
 */
class LegalCasesParticipantRepositoryEloquent extends BaseRepository implements LegalCasesParticipantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LegalCasesParticipant::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
