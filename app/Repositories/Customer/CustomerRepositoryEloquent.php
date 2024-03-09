<?php

namespace App\Repositories\Customer;

use App\Models\Customer\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Tenancy\Facades\Tenancy;

/**
 * Class CustomerRepositoryEloquent.
 */
class CustomerRepositoryEloquent extends BaseRepository implements CustomerRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Customer::class;
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
                AllowedFilter::exact('name'),
                AllowedFilter::exact('nif_number'),
                AllowedFilter::exact('email'),
                AllowedFilter::callback('search', function (Builder $query, $value) {
                    $query->where(function (Builder $subquery) use ($value) {
                        $subquery->where('name', 'LIKE', '%'.$value.'%')
                            ->orWhere('email', 'LIKE', '%'.$value.'%')
                            ->orWhere('nif_number', 'LIKE', '%'.$value.'%');
                    });
                }),
            ])
            ->where('tenant_id', Tenancy::getTenant()->id)
            ->jsonPaginate();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model());
    }
}
