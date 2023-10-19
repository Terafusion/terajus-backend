<?php

namespace App\Repositories\DocumentRequest;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DocumentRequest\DocumentRequestRepository;
use App\Models\DocumentRequest\DocumentRequest;
use App\Validators\DocumentRequest\DocumentRequestValidator;

/**
 * Class DocumentRequestRepositoryEloquent.
 *
 * @package namespace App\Repositories\DocumentRequest;
 */
class DocumentRequestRepositoryEloquent extends BaseRepository implements DocumentRequestRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DocumentRequest::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
