<?php

namespace App\Repositories\DocumentRequestDoc;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DocumentRequestDoc\DocumentRequestDocRepository;
use App\Models\DocumentRequestDoc\DocumentRequestDoc;
use App\Validators\DocumentRequestDoc\DocumentRequestDocValidator;

/**
 * Class DocumentRequestDocRepositoryEloquent.
 *
 * @package namespace App\Repositories\DocumentRequestDoc;
 */
class DocumentRequestDocRepositoryEloquent extends BaseRepository implements DocumentRequestDocRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DocumentRequestDoc::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
