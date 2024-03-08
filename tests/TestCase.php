<?php

namespace Tests;

use App\Models\Tenant\Tenant;
use App\Models\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;
use Tests\CreatesApplication;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    /** @var User */
    protected $user;

    /**
     * Set up the test
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('db:seed');
        $this->withHeaders(['Accept' => 'application/json']);
        $this->associateUserWithTenant();
    }

    /**
     * Associar o usuário a um Tenant
     */
    private function associateUserWithTenant()
    {
        $this->user = User::factory()->create();
        $tenant = Tenant::factory()->create();

        // Associar o usuário ao Tenant
        $this->user->tenant_id = $tenant->id;
        $this->user->is_tenant = true;
        $this->user->save();

        Passport::actingAs($this->user);
    }
}

