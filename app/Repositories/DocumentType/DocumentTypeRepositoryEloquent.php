<?php

namespace App\Repositories\DocumentType;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DocumentType\DocumentTypeRepository;
use App\Models\DocumentType\DocumentType;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class DocumentTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories\DocumentType;
 */
class DocumentTypeRepositoryEloquent extends BaseRepository implements DocumentTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DocumentType::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Return build Eloquent query
     *
     * @param \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|string $queryBuilder
     * @return Paginator
     */
    private function queryBuilder($queryBuilder)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::callback('name', function (Builder $query, $value) {
                    $query->where('name', 'LIKE', '%' . $value . '%');
                    $query->orWhere('description', 'LIKE', '%' . $value . '%');
                }),
            ])->jsonPaginate();
    }


    /**
     * @return Paginator
     */
    public function getAll()
    {
        return $this->queryBuilder($this->model());
    }
}
