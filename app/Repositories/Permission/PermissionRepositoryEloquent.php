<?php

namespace App\Repositories\Permission;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Permission\PermissionRepository;
use App\Models\Permission\Permission;
use App\Models\User\User;
use App\Traits\TenantScopeTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class PermissionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Permission;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    private function queryBuilder($queryBuilder)
    {
        $query = QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::callback('search', function (Builder $query, $value) {
                    $query->where(function (Builder $subquery) use ($value) {
                        $subquery->where('name', 'ILIKE', '%' . $value . '%');
                    });
                }),
            ])
            ->allowedSorts(['created_at']);

        return $query->jsonPaginate();
    }


    public function getAll(): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model());
    }
}
