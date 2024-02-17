<?php

namespace App\Repositories\User;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\User\UserRepository;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories\User;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
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
     * @return Querybuilder
     */
    private function queryBuilder($queryBuilder)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::callback('name', function (Builder $query, $value) {
                    $query->where('name', 'LIKE', '%' . $value . '%');
                }),
            ])->when(auth()->user(), function (Builder $query, $user) {
                $query->whereHas('professionals', function (Builder $subquery) use ($user) {
                    $subquery->where('professional_id', $user->id);
                })->orWhereHas('customers', function (Builder $subquery) use ($user) {
                    $subquery->where('customer_id', $user->id);
                });
            })
            ->get();
    }

    public function getAll()
    {
        return $this->queryBuilder($this->model());
    }
}
