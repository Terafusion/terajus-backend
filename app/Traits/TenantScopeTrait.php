<?php

namespace App\Traits;

use Spatie\QueryBuilder\QueryBuilder;
use Tenancy\Facades\Tenancy;

trait TenantScopeTrait
{
    protected function applyTenantScope(QueryBuilder $query, $user)
    {
        $query->where('tenant_id', config('terajus.default_tenant.id'))->orWhere('tenant_id', Tenancy::getTenant()->id);
        $this->addAdditionalFilters($query, $user);
    }

    abstract protected function addAdditionalFilters(QueryBuilder $query, $user);
}
