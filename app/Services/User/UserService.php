<?php

namespace App\Services\User;

use App\Models\User\User;
use App\Repositories\User\UserRepository;
use App\Services\Address\AddressService;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(private UserRepository $userRepository, private AddressService $addressService)
    {
    }

    /**
     * Get an user instance by ID
     * 
     * @param User $user
     * @return User
     */
    public function getById($user)
    {
        return $this->userRepository->find($user->id);
    }

    /**
     * Get all registers
     * 
     * @return Collection
     */
    public function getAll()
    {
        return $this->userRepository->all();
    }

    /**
     * Store a new User resource
     * 
     * @param array $data
     * @return User
     */
    public function store(array $data)
    {
        $user = $this->userRepository->create($data);
        $this->addressService->store($data['address'], $user);
        return $user;
    }

    /**
     * Update a User resource
     * 
     * @param array $data
     * @param User $user
     * @return User
     */
    public function update(array $data, User $user)
    {
        return $this->userRepository->update($data, $user->id);
    }
}
