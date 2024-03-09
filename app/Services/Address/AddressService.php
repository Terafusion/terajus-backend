<?php

namespace App\Services\Address;


use App\Models\Address\Address;
use App\Models\User\User;
use App\Repositories\Address\AddressRepository;

use Illuminate\Support\Collection;

class AddressService
{

    public function __construct(
        private AddressRepository $addressRepository,
    ) {
    }

    /**
     * Get an address instance by ID
     * 
     * @param int $addressId
     * @return Address
     */
    public function getById($addressId)
    {
        return $this->addressRepository->find($addressId);
    }

    /**
     * Get all registers
     * 
     * @return Collection
     */
    public function getAll()
    {
        return $this->addressRepository->getAll();
    }

    /**
     * Store a new Address resource
     * 
     * @param array $data
     * @param User $user
     * @return Address
     */
    public function store(array $data, User $user)
    {
        return $this->addressRepository->create(array_merge($data, ['addressable_id' => $user->id, 'addressable_type' => User::class]));
    }
}
