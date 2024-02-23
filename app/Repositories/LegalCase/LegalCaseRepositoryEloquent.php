<?php

namespace App\Repositories\LegalCase;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\LegalCase\LegalCaseRepository;
use App\Models\LegalCase\LegalCase;
use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class LegalCaseRepositoryEloquent.
 *
 * @package namespace App\Repositories\LegalCase;
 */
class LegalCaseRepositoryEloquent extends BaseRepository implements LegalCaseRepository
{
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
     * @param \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|string $queryBuilder
     * @param User $user
     * @return LengthAwarePaginator
     */
    private function queryBuilder($queryBuilder, $user)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
            ])->when($user, function (Builder $query, $user) {
                $query->where('user_id', $user->id)
                    ->orWhereHas('participants', function (Builder $subquery) use ($user) {
                        $subquery->where('user_id', $user->id);
                    });
            })->allowedSorts([
                'created_at',
            ])->jsonPaginate();
    }

    public function getAll(User $user): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model(), $user);
    }
}
