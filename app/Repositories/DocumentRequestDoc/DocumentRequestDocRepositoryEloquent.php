<?php

namespace App\Repositories\DocumentRequestDoc;

use App\Models\DocumentRequestDoc\DocumentRequestDoc;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class DocumentRequestDocRepositoryEloquent.
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
