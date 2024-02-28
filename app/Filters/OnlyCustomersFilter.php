<?php

namespace App\Filters;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class OnlyCustomersFilter implements Filter
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function __invoke(Builder $query, $value, $property): Builder
    {
        return $query->whereHas('legalCaseParticipations', function (Builder $legalCaseParticipationsQuery) {
            $legalCaseParticipationsQuery->where('participant_type_id', 1); //TODO - CRIAR FORMA MELHOR DE MAPEAR APENAS CLIENTES
            $legalCaseParticipationsQuery->whereHas('legalCase', function (Builder $legalCaseParticipationLegalCaseQuery) {
                $legalCaseParticipationLegalCaseQuery->where('user_id', $this->user->id);
            });
        });
    }
}
