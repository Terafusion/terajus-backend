<?php

namespace App\Repositories\Role;

use App\Models\Role\Role;
use App\Models\User\User;
use App\Traits\TenantScopeTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class RoleRepositoryEloquent.
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    use TenantScopeTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    private function queryBuilder($queryBuilder, User $user)
    {
        $query = QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::callback('search', function (Builder $query, $value) {
                    $query->where(function (Builder $subquery) use ($value) {
                        $subquery->where('name', 'ILIKE', '%'.$value.'%');
                    });
                }),
            ])
            ->allowedSorts(['created_at']);
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
