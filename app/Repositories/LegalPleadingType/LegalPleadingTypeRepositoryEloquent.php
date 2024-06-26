<?php

namespace App\Repositories\LegalPleadingType;

use App\Models\LegalPleadingType\LegalPleadingType;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class LegalPleadingTypeRepositoryEloquent.
 */
class LegalPleadingTypeRepositoryEloquent extends BaseRepository implements LegalPleadingTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LegalPleadingType::class;
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
                AllowedFilter::callback('name', function (Builder $query, $value) {
                    $query->where('name', 'ILIKE', '%'.$value.'%');
                    $query->orWhere('description', 'ILIKE', '%'.$value.'%');
                }),
            ])->jsonPaginate();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model());
    }
}
