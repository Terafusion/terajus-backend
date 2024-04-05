<?php

namespace App\Repositories\ParticipantType;

use App\Models\ParticipantType\ParticipantType;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ParticipantTypeRepositoryEloquent.
 */
class ParticipantTypeRepositoryEloquent extends BaseRepository implements ParticipantTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ParticipantType::class;
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
    private function queryBuilder($queryBuilder)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::callback('type', function (Builder $query, $value) {
                    $query->where('type', 'ILIKE', '%'.$value.'%');
                }),
            ])->jsonPaginate();
    }

    public function getAll(): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model());
    }
}
