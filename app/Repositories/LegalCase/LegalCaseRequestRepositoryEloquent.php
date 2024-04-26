<?php

namespace App\Repositories\LegalCase;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LegalCase\LegalCaseRequestRepository;
use App\Models\LegalCase\LegalCaseRequest;
use App\Validators\LegalCase\LegalCaseRequestValidator;

/**
 * Class LegalCaseRequestRepositoryEloquent.
 *
 * @package namespace App\Repositories\LegalCase;
 */
class LegalCaseRequestRepositoryEloquent extends BaseRepository implements LegalCaseRequestRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LegalCaseRequest::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
