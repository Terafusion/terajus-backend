<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Customer\Customer;
use Tenancy\Facades\Tenancy;

class UniqueTenantNifNumber implements Rule
{
    public function passes($attribute, $value)
    {
        $tenantId = Tenancy::getTenant()->id;

        if ($tenantId == 1) {
            return true;
        }

        $customer = Customer::where('nif_number', $value)
            ->where('tenant_id', $tenantId)
            ->first();

        return $customer ? false : true;
    }

    public function message()
    {
        return 'The :attribute has already been taken for this tenant.';
    }
}