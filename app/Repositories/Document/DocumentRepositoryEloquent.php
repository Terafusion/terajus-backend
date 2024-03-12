<?php

namespace App\Repositories\Document;

use App\Models\Document\Document;
use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class DocumentRepositoryEloquent.
 */
class DocumentRepositoryEloquent extends BaseRepository implements DocumentRepository
{
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

    /**
     * Return build Eloquent query
     *
     * @param  \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|string  $queryBuilder
     * @return LengthAwarePaginator
     */
    private function queryBuilder($queryBuilder, User $user)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::exact('user_id'),
                AllowedFilter::exact('model_type'),
                AllowedFilter::exact('model_id'),
            ])->when($user, function (Builder $query, $user) {
                $query->where(function (Builder $subquery) use ($user) {
                    $subquery->where('user_id', $user->id)
                        ->orWhere(function (Builder $documentRequestQuery) use ($user) {
                            $documentRequestQuery->where('model_type', 'App\Models\DocumentRequest\DocumentRequest')
                                ->whereHasMorph('model', ['App\Models\DocumentRequest\DocumentRequest'], function (Builder $subQuery) use ($user) {
                                    $subQuery->where(function (Builder $subSubQuery) use ($user) {
                                        $subSubQuery->where('client_id', $user->id)
                                            ->orWhere('user_id', $user->id);
                                    });
                                });
                        });
                });
            })
            ->jsonPaginate();
    }

    public function getAll(User $user): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model(), $user);
    }

    private function getAdditionalFilters(User $user): array
    {
        return [
            AllowedFilter::callback('user_id', function (Builder $query, $value) use ($user) {
                $query->where('user_id', $user->id);
            }),

            AllowedFilter::callback('document_request', function (Builder $query) use ($user) {
                $query->where('model_type', 'App\Models\DocumentRequest\DocumentRequest')
                    ->whereHas('documentRequest', function (Builder $documentRequestQuery) use ($user) {
                        $documentRequestQuery->where(function (Builder $subQuery) use ($user) {
                            $subQuery->where('client_id', $user->id)
                                ->orWhere('user_id', $user->id);
                        });
                    });
            }),
        ];
    }
}
