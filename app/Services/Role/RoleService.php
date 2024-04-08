<?php

namespace App\Services\Role;

use App\Models\Role\Role;
use App\Models\User\User;
use App\Repositories\Role\RoleRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RoleService
{
    public function __construct(private RoleRepository $roleRepository)
    {
    }

    /**
     * Get an role instance by ID
     *
     * @param  int  $id
     * @return Role
     */
    public function getById($id)
    {
        return $this->roleRepository->find($id);
    }

    /**
     * Get all registers
     *
     * @return LengthAwarePaginator
     */
    public function getAll(User $user)
    {
        return $this->roleRepository->getAll($user);
    }

    /**
     * Store a new Role resource
     *
     * @return Role
     */
    public function store(array $data)
    {
        $role = $this->roleRepository->create($data);
        if (isset($data['permissions'])) {
            $role->permissions()->sync($data['permissions']);
        }

        return $role;
    }

    /**
     * Update an role register
     *
     * @param  array  $data
     * @param  int  $id
     * @return Role
     */
    public function update($data, $id)
    {
        $role = $this->getById($id);
        $this->roleRepository->update($data, $role->id);

        if (isset($data['permissions'])) {
            $role->permissions()->sync($data['permissions']);
        }

        return $role;
    }

    /**
     * Delete an role register
     *
     * @param  int  $id
     * @return mixed
     */
    public function delete($id)
    {
        $role = $this->getById($id);
        return $this->roleRepository->delete($role->id);
    }
}
