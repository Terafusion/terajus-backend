<?php

namespace App\Rules;

use App\Models\Customer\Customer;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Gate;

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
        // Use a política qualificada para verificar se o usuário pode acessar o cliente
        $user = auth()->user();

        // Obtém a instância da política associada ao modelo Customer
        $customerPolicy = policy(Customer::class);

        $customer = Customer::find($value);

        // Verifica se o modelo foi encontrado
        if (!$customer) {
            return false;
        }

        // Chama o método na política para verificar a permissão
        return $customerPolicy->view($user, $customer);
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


