<?php

namespace App\Repositories\DocumentRequest;

use App\Models\DocumentRequest\DocumentRequest;
use App\Models\User\User;
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

    /**
     * Return build Eloquent query
     *
     * @param  \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|string  $queryBuilder
     * @param User
     * @return LengthAwarePaginator
     */
    private function queryBuilder($queryBuilder, $user)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::exact('user_id'),
                AllowedFilter::exact('client_id'),
            ])
            ->when($user, function (Builder $query, $user) {
                $query->where(function (Builder $subquery) use ($user) {
                    $subquery->where('client_id', $user->id)
                        ->orWhere('user_id', $user->id);
                });
            })
            ->jsonPaginate();
    }

    public function getAll(User $user): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model(), $user);
    }
}
