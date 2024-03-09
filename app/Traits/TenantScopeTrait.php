<?php

namespace App\Traits;

use Tenancy\Facades\Tenancy;
use Spatie\QueryBuilder\QueryBuilder;

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
