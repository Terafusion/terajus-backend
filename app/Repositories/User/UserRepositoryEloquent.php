<?php

namespace App\Repositories\User;

use App\Models\User\User;
use App\Traits\TenantScopeTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    use TenantScopeTrait;

    public function model()
    {
        return User::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    private function queryBuilder($queryBuilder, User $user)
    {
        $query = QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::exact('name'),
                AllowedFilter::exact('nif_number'),
                AllowedFilter::exact('email'),
                AllowedFilter::callback('search', function ($query, $value) {
                    $query->where(function ($query) use ($value) {
                        $query->where('name', 'ILIKE', '%'.$value.'%')
                            ->orWhere('email', 'ILIKE', '%'.$value.'%')
                            ->orWhere('nif_number', 'ILIKE', '%'.$value.'%');
                    });
                }),
                AllowedFilter::callback('role', function ($query, $value) {
                    $query->where(function ($query) use ($value) {
                        $query->whereHas('roles', function ($query) use ($value) {
                            $query->where('name', $value);
                        });
                    });
                }),
            ])
            ->allowedIncludes([
                'roles',
            ]);

        $this->applyTenantScope($query, $user);

        return $query->jsonPaginate();
    }

    public function getAll(User $user): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model(), $user);
    }

    protected function addAdditionalFilters($query, $user)
    {
    }
}
