<?php

namespace Tests\Feature\Permission;

use App\Models\Permission\Permission;
use Tests\TestCase;

class PermissionFeatureTest extends TestCase
{
    /**
     * Test the index route.
     *
     * @return void
     */
    public function test_index_permission()
    {
        $totalPermission = count(Permission::all());

        $response = $this->get('/api/permissions');

        $response->assertStatus(200);
        $response->assertJsonCount($totalPermission, 'data');
    }

    /**
     * Test the show route.
     *
     * @return void
     */
    public function test_show_permission()
    {
        $permission = Permission::factory()->create();

        $response = $this->get("/api/permissions/{$permission->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $permission->id,
            'name' => $permission->name,
        ]);
    }
}
