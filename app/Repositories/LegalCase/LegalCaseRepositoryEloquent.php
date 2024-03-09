<?php

namespace App\Repositories\LegalCase;

use App\Models\LegalCase\LegalCase;
use App\Models\User\User;
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
        return QueryBuilder::for($queryBuilder)
            ->allowedFilters([
                'id',
                AllowedFilter::exact('status'),
                AllowedFilter::exact('court'),
                AllowedFilter::exact('case_type'),
                AllowedFilter::exact('case_matter'),
                $this->customerFilter(),
                $this->professionalFilter(),
            ])
            ->when($user, function (Builder $query, $user) {
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

    protected function customerFilter()
    {
        return AllowedFilter::callback('customer', function (Builder $query, $value) {
            $query->whereHas('participants', function (Builder $participantsSubQuery) use ($value) {
                $participantsSubQuery->whereHas('user', function (Builder $participantsUserSubQuery) use ($value) {
                    $participantsUserSubQuery->where(function (Builder $userQuery) use ($value) {
                        $userQuery->where('name', 'LIKE', '%'.$value.'%')
                            ->orWhere('email', 'LIKE', '%'.$value.'%')
                            ->orWhere('nif_number', 'LIKE', '%'.$value.'%');
                    })->whereHas('roles', function (Builder $participantsUserRoleSubQuery) {
                        $participantsUserRoleSubQuery->where('name', 'customer');
                    });
                });
            });
        });
    }

    protected function professionalFilter()
    {
        return AllowedFilter::callback('professional', function (Builder $query, $value) {
            $query->whereHas('user', function (Builder $userSubQuery) use ($value) {
                $userSubQuery->where(function (Builder $userQuery) use ($value) {
                    $userQuery->where('name', 'LIKE', '%'.$value.'%')
                        ->orWhere('email', 'LIKE', '%'.$value.'%')
                        ->orWhere('nif_number', 'LIKE', '%'.$value.'%');
                })->whereHas('roles', function (Builder $participantsUserRoleSubQuery) {
                    $participantsUserRoleSubQuery->where('name', 'lawyer');
                });
            });
        });
    }
}
