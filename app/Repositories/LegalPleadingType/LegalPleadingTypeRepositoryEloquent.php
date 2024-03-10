<?php

namespace App\Repositories\LegalPleadingType;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LegalPleadingType\LegalPleadingTypeRepository;
use App\Models\LegalPleadingType\LegalPleadingType;
use App\Validators\LegalPleadingType\LegalPleadingTypeValidator;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\AllowedFilter;

/**
 * Class LegalPleadingTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories\LegalPleadingType;
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
                    $query->where('name', 'LIKE', '%' . $value . '%');
                    $query->orWhere('description', 'LIKE', '%' . $value . '%');
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
