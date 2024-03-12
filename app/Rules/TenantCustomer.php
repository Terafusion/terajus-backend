<?php

namespace App\Rules;

use App\Models\Customer\Customer;
use Illuminate\Contracts\Validation\Rule;

class TenantCustomer implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = auth()->user();

        $customerPolicy = policy(Customer::class);

        $customer = Customer::find($value);

        if (!$customer) {
            return false;
        }

        return $customerPolicy->attachOnLegalCases($user, $customer);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'O cliente não pertence ao tenant atual.';
    }
}
