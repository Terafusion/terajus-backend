<?php

namespace App\Repositories\Evidence;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Evidence\EvidenceRepository;
use App\Models\Evidence\Evidence;
use App\Validators\Evidence\EvidenceValidator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class EvidenceRepositoryEloquent.
 *
 * @package namespace App\Repositories\Evidence;
 */
class EvidenceRepositoryEloquent extends BaseRepository implements EvidenceRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Evidence::class;
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
     * @return Paginator
     */
    private function queryBuilder($queryBuilder)
    {
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::callback('description', function (Builder $query, $value) {
                    $query->where('description', 'ILIKE', '%' . $value . '%');
                }),
                AllowedFilter::exact('legal_case_id')
            ])->jsonPaginate();
    }


    /**
     * @return Paginator
     */
    public function getAll()
    {
        return $this->queryBuilder($this->model());
    }
}
