<?php

namespace App\Services\Customer;

use App\Models\Customer\Customer;
use App\Models\User\User;
use App\Repositories\Customer\CustomerRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Tenancy\Facades\Tenancy;

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
     * @param array $data
     * @return Customer
     */
    public function store(array $data)
    {
        return $this->customerRepository->create($data);
    }

    /**
     * Update a Customer resource
     * 
     * @param array $data
     * @param Customer $customer
     * @return Customer
     */
    public function update(array $data, Customer $customer)
    {
        return $this->customerRepository->update($data, $customer->id);
    }
}
