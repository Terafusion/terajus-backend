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
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Filters\OnlyCustomersFilter;

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
     * @return LengthAwarePaginator
     */
    private function queryBuilder($queryBuilder, $user)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::exact('name'),
                AllowedFilter::exact('nif_number'),
                AllowedFilter::exact('email'),
                AllowedFilter::callback('search', function (Builder $query, $value) use ($user) {
                    $query->where(function (Builder $subquery) use ($value, $user) {
                        $subquery->where('name', 'LIKE', '%' . $value . '%')
                            ->orWhere('email', 'LIKE', '%' . $value . '%')
                            ->orWhere('nif_number', 'LIKE', '%' . $value . '%');
                    });
                }),
                AllowedFilter::callback('role', function (Builder $query, $value) use ($user) {
                    $query->where(function (Builder $subquery) use ($value, $user) {
                        $subquery->whereHas('roles', function (Builder $rolesSubquery) use ($value) {
                            $rolesSubquery->where('name', $value);
                        });
                        // Adicione a lógica de relacionamento do usuário
                    });
                }),
                $this->onlyCustomersFilter($user),
            ])
            ->allowedIncludes([
                'roles',
            ])
            ->when($user, function (Builder $query, $user) {
                $query->where(function (Builder $subquery) use ($user) {
                    $this->applyUserRelationshipFilters($subquery, $user);
                });
            })->jsonPaginate();
    }

    public function getAll(User $user): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model(), $user);
    }

    /**
     * @param User $user
     * @return AllowedFilter
     */
    private function onlyCustomersFilter(User $user): AllowedFilter
    {
        return AllowedFilter::custom('only_customers', new OnlyCustomersFilter($user));
    }


    private function applyUserRelationshipFilters(Builder $query, $user)
    {
        $query->orWhereHas('professionals', function (Builder $professionalsSubquery) use ($user) {
            $professionalsSubquery->where('professional_id', $user->id);
        })->orWhereHas('customers', function (Builder $customersSubquery) use ($user) {
            $customersSubquery->where('customer_id', $user->id);
        });
    }
}
