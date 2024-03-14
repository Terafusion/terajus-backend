<?php

namespace App\Repositories\DocumentRequest;

use App\Models\DocumentRequest\DocumentRequest;
use App\Models\User\User;
use App\Traits\TenantScopeTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class DocumentRequestRepositoryEloquent.
 */
class DocumentRequestRepositoryEloquent extends BaseRepository implements DocumentRequestRepository
{
    use TenantScopeTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DocumentRequest::class;
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

    protected function addAdditionalFilters(QueryBuilder $query, $user)
    {
        $query->orWhereHas('customer', function (Builder $customerQuery) use ($user) {
            $customerQuery->where('nif_number', $user->nif_number);
        });
    }
}
