<?php

namespace App\Repositories\ParticipantType;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ParticipantType\ParticipantTypeRepository;
use App\Models\ParticipantType\ParticipantType;
use App\Validators\ParticipantType\ParticipantTypeValidator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ParticipantTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories\ParticipantType;
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
     * @param \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection|string $queryBuilder
     * @return Querybuilder
     */
    private function queryBuilder($queryBuilder)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::callback('type', function (Builder $query, $value) {
                    $query->where('type', 'LIKE', '%' . $value . '%');
                }),
            ])->get();
    }

    /**
     * @return Collection
     */
    public function getAll()
    {
        return $this->queryBuilder($this->model());
    }
}
