<?php

namespace App\Traits;

use Spatie\QueryBuilder\QueryBuilder;
use Tenancy\Facades\Tenancy;

trait TenantScopeTrait
{
    protected function applyTenantScope(QueryBuilder $query, $user)
    {
        if ($user->tenant_id !== null) {
            $query->where('tenant_id', Tenancy::getTenant()->id);
        } else {
            $this->addAdditionalFilters($query, $user);
        }
    }

    abstract protected function addAdditionalFilters(QueryBuilder $query, $user);
}
