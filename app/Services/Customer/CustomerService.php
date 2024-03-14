<?php

namespace App\Services\Customer;

use App\Models\Customer\Customer;
use App\Models\User\User;
use App\Repositories\Customer\CustomerRepository;
use App\Services\Address\AddressService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CustomerService
{
    public function __construct(
        private CustomerRepository $customerRepository,
        private AddressService $addressService,
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
        if (!$data['is_customer']) {
            $data['tenant_id'] = config('terajus.default_tenant.id');
        }
        $data['user_id'] = $user->id;

        $customer = $this->customerRepository->create($data);

        if (isset($data['address']) && !empty($data['address'])) {
            $data['address']['addressable_type'] = Customer::class;
            $data['address']['addressable_id'] = $customer->id;
            $this->addressService->store($data['address'], $user);
        }

        return $customer;
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
