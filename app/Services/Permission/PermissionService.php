<?php

namespace App\Services\Permission;

use App\Models\Permission\Permission;
use App\Models\User\User;
use App\Repositories\Permission\PermissionRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Tenancy\Facades\Tenancy;

class PermissionService
{
    public function __construct(private PermissionRepository $roleRepository)
    {
    }

    /**
     * Get an role instance by ID
     *
     * @param  int  $id
     * @return Permission
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
    public function getAll()
    {
        return $this->roleRepository->getAll();
    }
}
