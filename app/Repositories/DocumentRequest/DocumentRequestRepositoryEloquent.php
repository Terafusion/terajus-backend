<?php

namespace App\Repositories\DocumentRequest;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DocumentRequest\DocumentRequestRepository;
use App\Models\DocumentRequest\DocumentRequest;
use App\Models\User\User;
use App\Validators\DocumentRequest\DocumentRequestValidator;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Tenancy\Facades\Tenancy;

/**
 * Class DocumentRequestRepositoryEloquent.
 *
 * @package namespace App\Repositories\DocumentRequest;
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

    private function queryBuilder($queryBuilder, User $user)
    {
        $query = QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::exact('user_id'),
                AllowedFilter::exact('client_id'),
            ]);

        // Verifica se o usuário tem tenant associado
        if ($user->tenant_id !== null) {
            $query->where('tenant_id', Tenancy::getTenant()->id);
        } else {
            // Adicione lógica para recuperar recursos baseados em outros relacionamentos,
            // por exemplo, usando nif_number do usuário
            $query->whereHas('customer', function (Builder $customerQuery) use ($user) {
                $customerQuery->where('nif_number', $user->nif_number);
            });
        }

        return $query->jsonPaginate();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAll(User $user): LengthAwarePaginator
    {
        return $this->queryBuilder($this->model(), $user);
    }
}
