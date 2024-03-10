<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Tenancy\Facades\Tenancy;

class TenantObserver
{
    public function creating(Model $model)
    {
        $tenant = Tenancy::getTenant();
        if ($tenant && is_null($model->tenant_id)) {
            $model->tenant_id = $tenant->id ?? config('terajus_default_tenant.id');
        }
    }
}
