<?php

namespace App\Services\User;

use App\Models\User\User;
use App\Repositories\User\UserRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
    ) {
    }

    /**
     * Get all registers
     * 
     * @return LengthAwarePaginator
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
        
        if (isset($data['role'])) {
            $createdUser->assignRole($data['role']);
        }

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
