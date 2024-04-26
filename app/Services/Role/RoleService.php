<?php

namespace App\Services\Role;

use App\Models\Role\Role;
use App\Models\User\User;
use App\Repositories\Role\RoleRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Tenancy\Facades\Tenancy;

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
            $this->syncPermissions($role, $data);
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
            $this->syncPermissions($role, $data);
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

    public function syncPermissions(Role $role, array $data)
    {
        $tenantId = Tenancy::getTenant()->id ?? config('terajus_default_tenant.id');
        $pivotData = array_fill(0, count($data['permissions']), ['tenant_id' => $tenantId]);
        $syncData = array_combine($data['permissions'], $pivotData);
        $role->permissions()->sync($syncData);
    }
}
