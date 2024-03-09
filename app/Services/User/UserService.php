<?php

namespace App\Services\User;

use App\Models\User\User;
use App\Repositories\CustomerProfessional\CustomerProfessionalRepository;
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
    public function getAll(User $user)
    {
        return $this->userRepository->getAll($user);
    }

    /**
     * Store a new User resource
     * 
     * @param array $data
     * @param User|null $user
     * @return User
     */
    public function store(array $data, ?User $user = null)
    {
        return $this->userRepository->create($data);
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

    public function getAllAccessibleUsers(User $user)
    {
        return $this->userRepository->getAll($user);
    }
}
