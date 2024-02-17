<?php

namespace App\Services\User;

use App\Models\User\User;
use App\Repositories\CustomerProfessional\CustomerProfessionalRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Collection;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private CustomerProfessionalRepository $customerProfessionalRepository
    ) {
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
        $createdUser = $this->userRepository->create($data);
        $createdUser->assignRole($data['role']);
        $this->customerProfessionalRepository->create(['customer_id' => $createdUser->id, 'professional_id' => $user->id]);
        return $createdUser;
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
