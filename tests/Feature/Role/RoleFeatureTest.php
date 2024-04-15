<?php

namespace Tests\Feature\Role;

use App\Models\Permission\Permission;
use App\Models\Role\Role;
use Tests\TestCase;

class RoleFeatureTest extends TestCase
{
    /**
     * Test the creation of a role.
     *
     * @return void
     */
    public function test_store_role()
    {
        $permissions = [
            Permission::factory()->create()->id,
            Permission::factory()->create()->id,
            Permission::factory()->create()->id,
        ];

        $this->post('/api/roles', [
            'name' => 'role_name',
            'permissions' => $permissions,
        ])->assertStatus(201);

        $role = Role::where('name', 'role_name')->first();
        $this->assertDatabaseHas('roles', ['name' => 'role_name']);
        $this->assertDatabaseHas('role_has_permissions', ['role_id' => $role->id, 'permission_id' => $permissions[0]]);
    }

    public function test_update_role()
    {
        $role = Role::factory()->create();
        $permissions = [
            Permission::factory()->create()->id,
            Permission::factory()->create()->id,
            Permission::factory()->create()->id,
        ];

        $this->put("/api/roles/{$role->id}", [
            'name' => 'updated_role_name',
            'permissions' => $permissions,
        ])->assertStatus(200);

        $this->assertDatabaseHas('roles', ['id' => $role->id, 'name' => 'updated_role_name']);

        foreach ($permissions as $permission) {
            $this->assertDatabaseHas('role_has_permissions', ['role_id' => $role->id, 'permission_id' => $permission]);
        }
    }

    public function test_delete_role()
    {
        $role = Role::factory()->create();

        $this->delete("/api/roles/{$role->id}")->assertStatus(200);

        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }

    public function test_get_all_roles()
    {
        $count = count(Role::where('tenant_id', $this->user->tenant_id)->get());
        $this->get('/api/roles')->assertStatus(200)->assertJsonCount($count, 'data');
    }
}
