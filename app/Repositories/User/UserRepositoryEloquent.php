<?php

namespace App\Repositories\User;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\User\UserRepository;
use App\Models\User\User;
use Illuminate\Contracts\Pagination\Paginator;
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
     * @param User $user
     * @return Paginator
     */
    private function queryBuilder($queryBuilder, $user)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::exact('name'),
                AllowedFilter::exact('nif_number'),
                AllowedFilter::exact('email'),
                AllowedFilter::callback('search', function (Builder $query, $value) {
                    $query->where('name', 'LIKE', '%' . $value . '%')
                        ->orWhere('email', 'LIKE', '%' . $value . '%')
                        ->orWhere('nif_number', 'LIKE', '%' . $value . '%');
                }),
                AllowedFilter::callback('role', function (Builder $query, $value) {
                    $query->whereHas('roles', function (Builder $subquery) use ($value) {
                        $subquery->where('name', $value);
                    });
                }),
            ])->when($user, function (Builder $query, $user) {
                $query->whereHas('professionals', function (Builder $subquery) use ($user) {
                    $subquery->where('professional_id', $user->id);
                })->orWhereHas('customers', function (Builder $subquery) use ($user) {
                    $subquery->where('customer_id', $user->id);
                });
            })->jsonPaginate();
    }

    public function getAll(User $user): Paginator
    {
        return $this->queryBuilder($this->model(), $user);
    }
}
