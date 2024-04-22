<?php

namespace App\Repositories\Document;

use App\Models\Document\Document;
use App\Models\User\User;
use App\Traits\TenantScopeTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class DocumentRepositoryEloquent.
 */
class DocumentRepositoryEloquent extends BaseRepository implements DocumentRepository
{
    use TenantScopeTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Document::class;
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
                AllowedFilter::exact('user_id'),
                AllowedFilter::exact('customer_id'),
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
