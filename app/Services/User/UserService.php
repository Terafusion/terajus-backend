<?php

namespace App\Services\User;

use App\Models\User\User;
use App\Repositories\User\UserRepository;
use App\Services\Address\AddressService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function __construct(private UserRepository $userRepository, private AddressService $addressService)
    {
    }

    /**
     * Get an user instance by ID
     *
     * @param  User  $user
     * @return User
     */
    public function getById($user)
    {
        return $this->userRepository->find($user->id);
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
     * @param  User|null  $user
     * @return User
     */
    public function store(array $data, ?User $authUser = null)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->create($data);
            if (isset($data['role']) && ! empty($data['role'])) {
                $user->assignRole($data['role']);
            }
            if (isset($data['address']) && ! empty($data['address'])) {
                $data['address']['addressable_type'] = User::class;
                $data['address']['addressable_id'] = $user->id;
                $this->addressService->store($data['address'], $authUser);
            }
            DB::commit();

            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            throw $th;
        }
    }

    /**
     * Update a User resource
     *
     * @return User
     */
    public function update(array $data, User $user)
    {
        DB::beginTransaction();
        try {
            if (isset($data['role']) && ! empty($data['role'])) {
                $user->syncRoles($data['role']);
            }
            $user = $this->userRepository->update($data, $user->id);
            DB::commit();

            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            report($th);
            throw $th;
        }
    }
}
