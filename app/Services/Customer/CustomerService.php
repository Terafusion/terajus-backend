<?php

namespace App\Services\Customer;

use App\Models\Customer\Customer;
use App\Models\User\User;
use App\Repositories\Customer\CustomerRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CustomerService
{
    public function __construct(
        private CustomerRepository $customerRepository,
    ) {
    }

    /**
     * Get all registers
     *
     * @return LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->customerRepository->getAll();
    }

    /**
     * Store a new Customer resource
     *
     * @return Customer
     */
    public function store(array $data, User $user)
    {
        if (! $data['is_customer']) {
            $data['tenant_id'] = config('terajus.default_tenant.id');
        }
        $data['user_id'] = $user->id;

        return $this->customerRepository->create($data);
    }

    /**
     * Update a Customer resource
     *
     * @return Customer
     */
    public function update(array $data, Customer $customer)
    {
        return $this->customerRepository->update($data, $customer->id);
    }
}
