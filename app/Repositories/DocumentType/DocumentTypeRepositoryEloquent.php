<?php

namespace App\Repositories\DocumentType;


use App\Models\DocumentType\DocumentType;
use App\Models\User\User;
use App\Traits\TenantScopeTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class DocumentTypeRepositoryEloquent.
 */
class DocumentTypeRepositoryEloquent extends BaseRepository implements DocumentTypeRepository
{
    use TenantScopeTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DocumentType::class;
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
     * @param User
     * @return LengthAwarePaginator
     */
    private function queryBuilder($queryBuilder, User $user)
    {
        $query = QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::callback('name', function ($query, $value) {
                    $query->where(function ($query) use ($value) {
                        $query->where('name', 'ILIKE', '%' . $value . '%')
                            ->orWhere('description', 'ILIKE', '%' . $value . '%');
                    });
                }),
            ]);

        $this->applyTenantScope($query, $user);

        return $query->jsonPaginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAll(User $user)
    {
        return $this->queryBuilder($this->model(), $user);
    }

    protected function addAdditionalFilters($query, $user)
    {
    }
}
