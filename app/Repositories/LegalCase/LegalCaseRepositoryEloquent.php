<?php

namespace App\Repositories\LegalCase;

use App\Models\LegalCase\LegalCase;
use App\Models\User\User;
use App\Traits\TenantScopeTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class LegalCaseRepositoryEloquent.
 */
class LegalCaseRepositoryEloquent extends BaseRepository implements LegalCaseRepository
{
    use TenantScopeTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LegalCase::class;
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
        $query = QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::exact('status'),
                AllowedFilter::exact('court'),
                AllowedFilter::exact('case_type'),
                AllowedFilter::exact('case_matter'),
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
        $query->orWhereHas('participants.customer', function (Builder $participantsUserSubQuery) use ($user) {
            $participantsUserSubQuery->where('nif_number', $user->nif_number);
        });
    }
}
