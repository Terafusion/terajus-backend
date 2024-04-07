<?php

namespace App\Traits;

trait TenantScopeTrait
{
    protected function applyTenantScope($query, $user)
    {
        if ($user->tenant_id == config('terajus.default_tenant.id')) {
            $this->addAdditionalFilters($query, $user);
        } else {
            $query->where('tenant_id', $user->tenant_id);
            $this->addAdditionalFilters($query, $user);
        }
    }

    abstract protected function addAdditionalFilters($query, $user);
}
