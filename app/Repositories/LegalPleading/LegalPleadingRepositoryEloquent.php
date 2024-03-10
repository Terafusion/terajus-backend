<?php

namespace App\Repositories\LegalPleading;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LegalPleading\LegalPleadingRepository;
use App\Models\LegalPleading\LegalPleading;
use App\Validators\LegalPleading\LegalPleadingValidator;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class LegalPleadingRepositoryEloquent.
 *
 * @package namespace App\Repositories\LegalPleading;
 */
class LegalPleadingRepositoryEloquent extends BaseRepository implements LegalPleadingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LegalPleading::class;
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
     * @param  \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|string  $queryBuilder
     * @return LengthAwarePaginator
     */
    private function queryBuilder($queryBuilder)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::callback('search', function (Builder $query, $value) {
                    $query->where('content', 'LIKE', '%' . $value . '%');
                    $query->orWhere('context', 'LIKE', '%' . $value . '%');
                }),
            ])->jsonPaginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model());
    }
}
