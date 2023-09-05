<?php

namespace App\Repositories\Document;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Document\DocumentRepository;
use App\Models\Document\Document;
use App\Validators\Document\DocumentValidator;

/**
 * Class DocumentRepositoryEloquent.
 *
 * @package namespace App\Repositories\Document;
 */
class DocumentRepositoryEloquent extends BaseRepository implements DocumentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Document::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
