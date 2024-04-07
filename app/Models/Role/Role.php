<?php

namespace App\Models\Role;

use App\Models\Permission\RoleHasPermission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Traits\HasPermissions;

class Role extends SpatieRole
{
    use HasPermissions {
        givePermissionTo as protected parentGivePermissionTo;
    }

    protected $fillable = [
        'name',
        'guard_name',
        'tenant_id',
    ];

    /**
     * Grant the given permission(s) to a role.
     *
     * @param  string|int|array|\Spatie\Permission\Contracts\Permission|\Illuminate\Support\Collection  $permissions
     * @return $this
     */
    public function givePermissionTo(...$permissions)
    {
        foreach ($permissions as $permission) {
            if (is_array($permission) || $permission instanceof \Illuminate\Support\Collection) {
                foreach ($permission as $perm) {
                    $this->associatePermission($perm);
                }
            } else {
                $this->associatePermission($permission);
            }
        }
    }

    protected function associatePermission(mixed $permission)
    {
        $permission = $this->getPermissionByField($permission);

        RoleHasPermission::firstOrCreate([
            'role_id' => $this->id,
            'permission_id' => $permission->id,
        ]);
    }

    protected function getPermissionByField(mixed $permission): ?Permission
    {
        return match (true) {
            is_numeric($permission) => Permission::findById($permission),
            is_string($permission) => Permission::findByName($permission),
            $permission instanceof Permission => $permission,
            default => null,
        };
    }
}
