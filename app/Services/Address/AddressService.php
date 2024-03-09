<?php

namespace App\Services\Address;

use App\Models\Address\Address;
use App\Models\User\User;
use App\Repositories\Address\AddressRepository;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AddressService
{
    public function __construct(
        private AddressRepository $addressRepository,
    ) {
    }

    /**
     * Get an address instance by ID
     *
     * @param  int  $addressId
     * @return Address
     */
    public function getById($addressId)
    {
        return $this->addressRepository->find($addressId);
    }

    /**
     * Get all registers
     *
     * @return LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->addressRepository->getAll();
    }

    /**
     * Store a new Address resource
     *
     * @return Address
     */
    public function store(array $data, User $user)
    {
        $this->checkAddressableData($data);

        return $this->addressRepository->create(array_merge($data, ['user_id' => $user->id]));
    }

    /**
     * Update an address register
     *
     * @param  int  $user
     * @return Address
     */
    public function update(array $data, int $id)
    {
        return $this->addressRepository->update($data, $id);
    }

    public function checkAddressableData(array $data): void
    {
        if (! isset($data['addressable_type']) || empty($data['addressable_type']) || ! isset($data['addressable_id']) || empty($data['addressable_id'])) {
            throw new Exception('The addressable information is required');
        }
    }
}
