<?php

namespace App\Repositories\User;

use App\Filters\OnlyCustomersFilter;
use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class UserRepositoryEloquent.
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
     * @param  \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|string  $queryBuilder
     * @param  User  $user
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
                AllowedFilter::callback('search', function (Builder $query, $value) {
                    $query->where(function (Builder $subquery) use ($value) {
                        $subquery->where('name', 'ILIKE', '%'.$value.'%')
                            ->orWhere('email', 'ILIKE', '%'.$value.'%')
                            ->orWhere('nif_number', 'ILIKE', '%'.$value.'%');
                    });
                }),
                AllowedFilter::callback('role', function (Builder $query, $value) {
                    $query->where(function (Builder $subquery) use ($value) {
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
