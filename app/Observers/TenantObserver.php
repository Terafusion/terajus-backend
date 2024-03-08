<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Tenancy\Facades\Tenancy;

class TenantObserver
{
    public function creating(Model $model)
    {
        $tenant = Tenancy::getTenant();
        if ($tenant) {
            $model->tenant_id = $tenant->id;
        }
    }
}
