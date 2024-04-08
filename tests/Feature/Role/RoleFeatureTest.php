<?php

namespace Tests\Feature\Role;

use App\Models\Permission\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Role\Role;

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
}